export default {
    props: ['estilo_container_candidato', 'estilo_curriculum_visible', 'nombre_o_id_candidatos', 'edad_o_experiencia_candidatos', 'i', 'id_oferta', 'id_candidato'],
    template: `
    <div class="container_candidato">
        <div class="container_left_candidato">
            <div class="imagen_candidato"></div>
            <div class="nombre_edad">
                <div class="nombre">
                    <h3><span v-if="nombre_o_id_candidatos >= 0">#</span>{{ nombre_o_id_candidatos[i - 1] }}</h3>
                </div>
                <div class="edad">
                    <p>{{ edad_o_experiencia_candidatos[i - 1] }} años</p>
                </div>
            </div>
        </div>
        <div class="container_mid_candidato" style="{{ estilo_container_candidato }}">
            <div class="curriculum" style="{{ estilo_curriculum_visible }}">
                <a href="ver_curriculum_en_pdf">Curriculum</a>
            </div>
        </div>
        <div class="container_right_candidato">
            <div class="imagen_nota_ojo">
                <div class="imagen_nota">
                    <button @click.prevent="muestraNota"></button>
                </div>
                <div class="imagen_ojo">
                    <button @click.prevent="avisoPadreImpresionCurriculum"></button>
                </div>
            </div>
        </div>
    </div>
    `,
    name: "curriculum_simplificado",
    methods: {
        avisoErrorPeticion(){
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });
            Toast.fire({
                icon: "error",
                title: "Se ha producido un error"
            });
        },
        async obtenerDatosNota(){
            try {
                let datosNota = await $.get('http://next-job.lan/build/assets/php/obtener_nota.php?id_demandante=' + this.id_candidato + '&id_oferta=' + this.id_oferta).fail(() => {
                    this.avisoErrorPeticion();
                });

                let objeto = datosNota;
                objeto = JSON.parse(objeto);

                console.log(objeto["nota"]);

                return objeto["nota"];
            } catch (error) {
                console.error('Se ha producido un error', error);
            }
        },
        editarNota(texto){
            try{
                let parametrosConsulta = "texto=" + texto + "&id_demandante=" + this.id_candidato + '&id_oferta=' + this.id_oferta;

                $.post('http://next-job.lan/build/assets/php/editar_nota.php', parametrosConsulta).done(function (){
                    console.log("Nota editada");
                }).fail(() => {
                    this.avisoErrorPeticion();
                });
            } catch(error){
                console.error("Se ha producido un error", error);
            }
        },
        popUpConfirmaEdicion(){
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });
            Toast.fire({
                icon: "success",
                title: "Nota editada correctamente"
            });
        },
        async muestraNota(){
            let textoNota = await this.obtenerDatosNota();

            const { valor: textoInsertado } = await Swal.fire({
                input: "textarea",
                inputLabel: "Escribe una nota",
                inputPlaceholder: "Puedes escribir una anotación para este usuario",
                inputValue: textoNota,
                inputAttributes: {
                  "aria-label": "Escribe una nota"
                },
                confirmButtonText: "Editar",
                confirmButtonColor: "#2FB9CE",
                showCancelButton: true,
                cancelButtonText: "Volver",
                cancelButtonColor: "#FFFFFF",
                customClass: {
                    input: "text_area",
                    confirmButton: "boton_confirmar",
                    cancelButton: "boton_cancelar",
                },
                preConfirm: () => {
                    let texto = Swal.getPopup().querySelector("textarea").value;
                    if (texto != textoNota) {
                        this.editarNota(texto);
                        this.popUpConfirmaEdicion();
                    }
                }
            });
        },
        avisoPadreImpresionCurriculum(){
            this.$emit('impresionCurriculum', this.id_candidato);
        },
    }
}
