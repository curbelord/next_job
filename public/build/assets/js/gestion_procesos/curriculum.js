import experiencia_laboral from "./experiencia_laboral.js";
import formacion from "./formacion.js";

export default {
    props: ['id_candidato', 'id_oferta', 'nombre', 'fecha_nacimiento', 'direccion_postal', 'telefono', 'email', 'nombre_estado', 'fecha_ultimo_estado', 'nombre_experiencia', 'empresa_experiencia', 'fecha_inicio_experiencia', 'fecha_fin_experiencia', 'descripcion_experiencia', 'nombre_formacion', 'centro_formacion', 'fecha_inicio_formacion', 'fecha_fin_formacion', 'curriculums_ciegos'],
    components: {
        experiencia_laboral,
        formacion,
    },
    template: `
    <div id="container_datos_top_curriculum">
        <div class="container_boton_volver">
            <button type="button" @click.prevent="avisoPadreocultarCurriculum">Volver</button>
        </div>

        <div id="subcontainer_datos_curriculum">
            <div id="datos_curriculum">
                <div id="imagen_usuario_curriculum"></div>
                <div id="container_datos_curriculum">
                    <div id="valor_datos_curriculum">
                        <div id="nombre_usuario_curriculum">
                            <h3 v-if="curriculums_ciegos == 'NO'">{{ nombre }}</h3>
                            <h3 v-else>#{{ id_candidato }}</h3>
                        </div>
                        <div id="fecha_nacimiento_curriculum">
                            <p v-if="curriculums_ciegos == 'NO'">{{ fecha_nacimiento }}</p>
                            <p v-else></p>
                        </div>
                        <div id="direccion_postal_curriculum">
                            <p>{{ direccion_postal }}</p>
                        </div>
                        <div id="telefono_curriculum">
                            <p>{{ telefono }}</p>
                        </div>
                        <div id="correo_electronico_curriculum">
                            <p v-if="curriculums_ciegos == 'NO'">{{ email }}</p>
                            <p v-else>{{ email.replace(/^([^@]+)(?=@)/, '*'.repeat(email.substring(0, email.indexOf('@')).length)) }}</p>
                        </div>
                    </div>

                    <div id="container_datos_ultimo_estado_curriculum">
                        <div id="subcontainer_datos_ultimo_estado_curriculum">
                            <h3>{{ nombre_estado }}</h3>
                            <p>{{ fecha_ultimo_estado }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="container_opciones_estado_curriculum">
            <div id="preseleccionar_curriculum" class="opcion_estado_curriculum">
                <div id="imagen_preseleccionar_curriculum" class="imagen_opciones_estado_curriculum">
                    <button type="button" @click.prevent="muestraPopUpAccion('Preseleccionado')"></button>
                </div>
                <div id="boton_preseleccionar_curriculum" class="boton_opciones_estado_curriculum">
                    <button type="button" @click.prevent="muestraPopUpAccion('Preseleccionado')">Preseleccionar</button>
                </div>
            </div>
            <div id="descartar_curriculum" class="opcion_estado_curriculum">
                <div id="imagen_descartar_curriculum" class="imagen_opciones_estado_curriculum">
                    <button type="button" @click.prevent="muestraPopUpAccion('Descartado')"></button>
                </div>
                <div id="boton_descartar_curriculum" class="boton_opciones_estado_curriculum">
                    <button type="button" @click.prevent="muestraPopUpAccion('Descartado')">Descartar</button>
                </div>
            </div>
            <div id="seleccionar_entrevista_curriculum" class="opcion_estado_curriculum">
                <div id="imagen_seleccionar_entrevista_curriculum" class="imagen_opciones_estado_curriculum">
                    <button type="button" @click.prevent="muestraPopUpAccion('Seleccionado para entrevista')"></button>
                </div>
                <div id="boton_seleccionar_entrevista_curriculum" class="boton_opciones_estado_curriculum">
                    <button type="button" @click.prevent="muestraPopUpAccion('Seleccionado para entrevista')">Seleccionar para entrevista</button>
                </div>
            </div>
            <div id="entrevista_positiva_curriculum" class="opcion_estado_curriculum">
                <div id="imagen_entrevista_positiva_curriculum" class="imagen_opciones_estado_curriculum">
                    <button type="button" @click.prevent="muestraPopUpAccion('Entrevista positiva')"></button>
                </div>
                <div id="boton_entrevista_positiva_curriculum" class="boton_opciones_estado_curriculum">
                    <button type="button" @click.prevent="muestraPopUpAccion('Entrevista positiva')">Entrevista positiva</button>
                </div>
            </div>
            <div id="entrevista_negativa_curriculum" class="opcion_estado_curriculum">
                <div id="imagen_entrevista_negativa_curriculum" class="imagen_opciones_estado_curriculum">
                    <button type="button" @click.prevent="muestraPopUpAccion('Entrevista negativa')"></button>
                </div>
                <div id="boton_entrevista_negativa_curriculum" class="boton_opciones_estado_curriculum">
                    <button type="button" @click.prevent="muestraPopUpAccion('Entrevista negativa')">Entrevista negativa</button>
                </div>
            </div>
        </div>
    </div>

    <div id="container_experiencia_laboral_curriculum">
        <div id="titulo_experiencia_laboral_curriculum">
            <h3>Experiencia laboral</h3>
        </div>
        <div id="subcontainer_experiencia_laboral_curriculum">
            <experiencia_laboral v-for="i in nombre_experiencia.length" :key="i" :nombre_experiencia="nombre_experiencia[i - 1]" :empresa_experiencia="empresa_experiencia[i - 1]" :fecha_inicio_experiencia="fecha_inicio_experiencia[i - 1]" :fecha_fin_experiencia="fecha_fin_experiencia[i - 1]" :descripcion_experiencia="descripcion_experiencia[i - 1]"></experiencia_laboral>
        </div>
    </div>

    <div id="container_formacion_curriculum">
        <div id="titulo_formacion_curriculum">
            <h3>Formación</h3>
        </div>
        <div id="subcontainer_formacion_curriculum">
            <formacion v-for="i in nombre_formacion.length" :key="i" :nombre_formacion="nombre_formacion[i - 1]" :centro_formacion="centro_formacion[i - 1]" :fecha_inicio_formacion="fecha_inicio_formacion[i - 1]" :fecha_fin_formacion="fecha_fin_formacion[i - 1]"></formacion>
        </div>
    </div>
    `,
    emits: ['ocultarCurriculum'],
    methods: {
        avisoPadreocultarCurriculum(){
            this.$emit('ocultarCurriculum', true);
        },
        anhadirEstado(nombre, descripcion){
            let parametrosConsulta = "nombre=" + nombre + "&descripcion=" + descripcion + '&id_demandante=' + this.id_candidato + '&id_oferta=' + this.id_oferta + "&visto=0";

            $.post('http://next-job.lan/build/assets/php/anhadir_estado_inscripcion.php', parametrosConsulta).done(function (respuesta){
                console.log(respuesta);
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
        cambiaEstadoFisicamente(nuevoEstado){
            let fechaActual = new Date();
            let dia = fechaActual.getDay();
            let mes = fechaActual.getMonth();
            let anho = fechaActual.getFullYear();

            $("#subcontainer_datos_ultimo_estado_curriculum h3").text(nuevoEstado);
            $("#subcontainer_datos_ultimo_estado_curriculum p").text(`${dia}/${mes}/${anho}`);
        },
        async muestraPopUpAccion(accion){
            const { valor: textoInsertado } = await Swal.fire({
                title: `¿Añadir estado "${accion}"?`,
                icon: "question",
                input: "textarea",
                inputPlaceholder: "Puedes escribir una descripción",
                showCancelButton: true,
                confirmButtonText: "Añadir",
                confirmButtonColor: "#2FB9CE",
                cancelButtonText: "Volver",
                cancelButtonColor: "#FFFFFF",
                customClass: {
                    confirmButton: "boton_confirmar",
                    cancelButton: "boton_cancelar",
                },
                preConfirm: () => {
                    let descripcion = Swal.getPopup().querySelector("textarea").value;
                    descripcion == "" ? descripcion = null : false;

                    this.anhadirEstado(accion, descripcion);
                    this.cambiaEstadoFisicamente(accion);
                    this.popUpConfirmaCambioEstado();
                }
            });
        },
    }
}
