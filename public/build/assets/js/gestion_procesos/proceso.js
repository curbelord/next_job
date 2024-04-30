export default {
    props: ['referencia', 'puesto_trabajo', 'ubicacion', 'fecha_creacion', 'numero_candidatos', 'estado'],
    data(){
        return{
            estadosPosibles: ["Publicada", "Oculta", "Borrador"],
            estadoSeleccionado: this.estado,
            copiaEstadoEntrante: this.estado,
        }
    },
    template: `
    <div class="container_proceso">
        <div class="titulo_proceso">
            <h3>{{ puesto_trabajo }}</h3>
        </div>
        <div class="datos_mid_proceso">
            <div class="datos_mid_left_proceso">
                <div class="centro_trabajo">
                    <p>{{ ubicacion }}</p>
                </div>
                <div class="fecha_publicacion">
                    <p>{{ fecha_creacion }}</p>
                </div>
                <div class="numero_candidatos_oferta">
                    <div class="imagen_numero_candidatos_oferta"></div>
                    <div class="valor_numero_candidatos_oferta">
                        <p>{{ numero_candidatos }}</p>
                    </div>
                </div>
            </div>
            <div class="datos_mid_mid_proceso">
                <div class="estado" @change="muestraPopUpEdicionEstado">
                    <select v-model="estadoSeleccionado">
                        <option v-if="estadoSeleccionado === 'Autocandidatura'" :selected="estadoSeleccionado === 'Autocandidatura'" value="Autocandidatura">Autocandidatura</option>
                        <option v-else v-for="estadoActual in estadosPosibles" :selected="estadoActual == estado" :value="estadoActual">{{ estadoActual }}</option>
                    </select>
                </div>
            </div>
            <div class="datos_mid_right_proceso">
                <div class="hipervinculos">
                    <div class="imagen_datos_mid_right imagen_ojo">
                        <button type="button" @click.prevent="avisoPadreImpresionProceso"></button>
                    </div>
                    <div class="imagen_datos_mid_right imagen_lapiz">
                        <button type="button" @click.prevent="avisoPadreEdicionProceso"></button>
                    </div>
                    <div class="imagen_datos_mid_right imagen_papelera">
                        <button type="button" @click.prevent="avisoPadreEliminacionProceso"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `,
    methods: {
        avisoPadreImpresionProceso(){
            this.$emit('abrirProceso', this.referencia);
        },
        avisoPadreEdicionProceso(){
            this.$emit('editarProceso', this.referencia);
        },
        avisoPadreEliminacionProceso(){
            this.$emit('eliminarProceso', this.referencia);
        },
        obtieneOpcionSeleccionada(){
            let opciones = document.querySelectorAll("option");
            let estado = ""

            for (let i = 0; i < opciones.length; i++){
                opciones[i].getAttribute("selected") ? estado = opciones[i].getAttribute("selected") : false;
            }

            console.log(estado);

            return estado;
        },
        reseteaSelectAEstadoOriginal(){
            this.estadoSeleccionado = this.copiaEstadoEntrante;
        },
        actualizaEstado(){
            // let estado = this.obtieneOpcionSeleccionada();
            let parametrosPeticion = "estado=" + this.estadoSeleccionado + "&referencia=" + this.referencia;

            $.post('http://next-job.lan/build/assets/php/actualizar_estado_proceso.php', parametrosPeticion).done(function (){
                console.log("Estado actualizado");
            });
        },
        popUpConfirmaCambioEstado(){
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });
            Toast.fire({
                icon: "success",
                title: "Estado actualizado correctamente"
            });
        },
        async muestraPopUpEdicionEstado(){
            await Swal.fire({
                title: "¿Quieres cambiar el estado del proceso?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Cambiar",
                confirmButtonColor: "#2FB9CE",
                cancelButtonText: "Cancelar",
                cancelButtonColor: "#FFFFFF",
                customClass: {
                  confirmButton: "boton_confirmar",
                  cancelButton: "boton_cancelar",
                },
                preConfirm: () => {
                    this.actualizaEstado();
                    this.popUpConfirmaCambioEstado();
                    this.copiaEstadoEntrante = this.estadoSeleccionado;
                    console.log(this.estadoSeleccionado);
                }
            }).then((result) => {
                if (result && result.dismiss === Swal.DismissReason.cancel) {
                    this.reseteaSelectAEstadoOriginal();
                }
            });

        },
    },
}
