export default {
    props: ['estilo_container_candidato', 'estilo_curriculum_visible', 'nombre_o_id_candidatos', 'edad_o_experiencia_candidatos', 'i', 'id_oferta', 'id_candidato'],
    data(){
        return {
            idCandidatos: [],
        }
    },
    template: `
    <div class="container_candidato">
        <div class="container_left_candidato">
            <div class="imagen_candidato"></div>
            <div class="nombre_edad">
                <div class="nombre">
                    <h3>{{ nombre_o_id_candidatos[i - 1] }}</h3>
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
                    <a href="ver_nota" @click.prevent="muestraNota"></a>
                </div>
                <div class="imagen_ojo">
                    <a href="ver_curriculum" @click.prevent="avisoPadreImpresionCurriculum"></a>
                </div>
            </div>
        </div>
    </div>
    `,
    name: "curriculum_simplificado",
    methods: {
        async obtenerDatosNota(){
            try {
                let datosNota = await $.get('http://next-job.lan/build/assets/php/obtener_nota.php?id_demandante=' + this.id_candidato + '&id_oferta=' + this.id_oferta);

                let objeto = datosNota;
                objeto = JSON.parse(objeto);

                console.log(objeto["nota"]);

                return objeto["nota"];
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        editarNota(texto){
            let parametrosConsulta = "texto=" + texto + "&id_demandante=" + this.id_candidato + '&id_oferta=' + this.id_oferta;

            $.post('http://next-job.lan/build/assets/php/editar_nota.php', parametrosConsulta).done(function (){
                console.log("Nota editada");
            });
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
