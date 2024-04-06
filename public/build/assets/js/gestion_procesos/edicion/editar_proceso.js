export default {
    props: ['puesto_trabajo', 'ubicacion', 'tipo_trabajo', 'sector', 'descripcion', 'estudios_minimos', 'experiencia_minima', 'jornada', 'turno', 'numero_vacantes', 'salario', 'fecha_cierre', 'estado', 'referencia'],
    data(){
        return {
            // Datos estructuras <select>

            tiposTrabajo: ["Presencial", "Teletrabajo", "Mixto"],
            familiasProfesionales: ['Actividades Físicas y Deportivas', 'Administración y Gestión', 'Agroalimentario', 'Artes Gráficas', 'Construcción', 'Energía', 'Imagen Personal', 'Imagen y Sonido', 'Industrial', 'Informática y Comunicaciones', 'Logística, Transporte y Comercio', 'Mantenimiento', 'Medio Ambiente', 'Químico', 'Salud', 'Servicios Turísticos y Hosteleros', 'Textil'],
            estudios: ['Graduado Escolar', 'ESO', 'Bachillerato', 'Formación Profesional Básica', 'Ciclo Formativo de Grado Medio', 'Ciclo Formativo de Grado Superior', 'Enseñanzas artísticas', 'Enseñanzas deportivas', 'Licenciatura', 'Máster', 'Doctorado', 'Grado Universitario', 'No requerida'],
            turnos: ["Mañana", "Tarde", "Noche"],
            estados: ["Publicada", "Plantilla", "Borrador"],
        }
    },
    template: `
    <div id="container_publica_oferta">
        <div class="container_boton_volver">
            <button type="button" @click.prevent="avisoPadreOcultarEditarProceso">Volver</button>
        </div>
        <div id="titulo_publica_oferta">
            <h3>Edita una oferta</h3>
        </div>

        <form method="GET" action="#">
            <input type="text" id="titulo_crear_oferta" class="input_formulario" name="puesto_trabajo" placeholder="Título" :value="puesto_trabajo">

            <input type="text" id="centro_trabajo_oferta" class="input_formulario" name="ubicacion" placeholder="Ubicación del centro de trabajo" :value="ubicacion">

            <div id="container_tipo_trabajo_sector">
                <select id="tipo_trabajo_oferta" class="input_formulario" name="tipo_trabajo">
                    <option v-for="tipo in tiposTrabajo" :value="tipo" :selected="tipo_trabajo == tipo">{{ tipo }}</option>
                </select>

                <select id="sector_oferta" class="input_formulario" name="sector">
                    <option v-for="familia in familiasProfesionales" :value="familia" :selected="sector == familia">{{ familia }}</option>
                </select>
            </div>

            <textarea rows="10" id="descripcion_crear_oferta" class="input_formulario" name="descripcion" placeholder="Descripción">{{ descripcion }}</textarea>

            <div id="container_estudios_experiencia">
                <select id="select_estudios_crear_oferta" class="input_formulario" name="estudios_minimos">
                    <option v-for="estudio in estudios" :value="estudio" :selected="estudios_minimos == estudio">{{ estudio }}</option>
                </select>

                <input type="number" id="experiencia_crear_oferta" class="input_formulario" name="experiencia_minima" placeholder="Experiencia mínima" min="0" :value="experiencia_minima">
            </div>

            <div id="container_jornada_turno">
                <select id="select_jornada_crear_oferta" class="input_formulario" name="jornada">
                    <option :value="'Completa'" :selected="jornada == 'Completa'">Completa</option>
                    <option :value="'Parcial'" :selected="jornada == 'Parcial'">Parcial</option>
                </select>

                <select id="select_turno_crear_oferta" class="input_formulario" name="turno">
                    <option v-for="turnoActual in turnos" :value="turnoActual" :selected="turno == turnoActual">{{ turnoActual }}</option>
                </select>
            </div>

            <div id="container_vacantes_salario">
                <input type="number" id="vacantes_crear_oferta" class="input_formulario" name="numero_vacantes" placeholder="Nº vacantes" min="1" :value="numero_vacantes">

                <input type="number" id="salario_crear_oferta" class="input_formulario" name="salario" placeholder="Salario" :value="salario">
            </div>

            <div id="container_cierre_cuestionario">
                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="cierre_crear_oferta" class="input_formulario" name="fecha_cierre" placeholder="Fecha cierre" :value="fecha_cierre">

                <select id="select_estado_crear_oferta" class="input_formulario" name="estado">
                    <option v-for="estadoActual in estados" :value="estadoActual" :selected="estado == estadoActual">{{ estadoActual }}</option>
                </select>
            </div>

            <!-- <button type="button" id="preguntas_crear_oferta" class="input_formulario">Killer questions</button>

            <div id="container_cuestionario">
                <div id="titulo_cuestionario">
                    <h3>Killer questions</h3>
                </div>
                <div id="preguntas_cuestionario">
                    <div class="pregunta">
                        <div class="titulo_pregunta">
                            <input type="text" id="titulo_pregunta_" class="input_formulario" name="titulo_pregunta_" placeholder="Pregunta">
                        </div>
                        <div class="tipo_pregunta">
                            <select id="select_tipo_pregunta" class="input_formulario" name="select_tipo_pregunta">
                                <option value="Abierta">Abierta</option>
                                <option value="Cerrada">Cerrada</option>
                                <option value="null" selected>Abierta/cerrada</option>
                            </select>



                                Si la pregunta es abierta, entonces desplegar los campos para indicar las opciones que se permiten

                                POSIBLEMENTE QUITAR EL SELECT Y AÑADIR UN INPUT TYPE RADIO, PORQUE EL SELECT IMPIDE HACER COSAS EN FUNCIÓN DE LA OPCIÓN ESCOGIDA



                        </div>
                    </div>
                </div>
            </div> -->

            <div id="container_publicar_guardar_plantilla">
                <input @click.prevent="popUpEditarProceso" name="publicada" type="button" id="enviar_oferta" class="input_formulario" value="Editar">
            </div>
        </form>
    </div>
    `,
    methods: {
        avisoPadreOcultarEditarProceso(){
            this.$emit('ocultarEditarProceso', true);
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
                title: "Proceso editado correctamente"
            });
        },
        actualizarProceso(arrayDatos){
            let parametrosConsulta = {
                puesto_trabajo: arrayDatos[0],
                ubicacion: arrayDatos[1],
                tipo_trabajo: arrayDatos[2],
                sector: arrayDatos[3],
                descripcion: arrayDatos[4],
                estudios_minimos: arrayDatos[5],
                experiencia_minima: arrayDatos[6],
                jornada: arrayDatos[7],
                turno: arrayDatos[8],
                numero_vacantes: arrayDatos[9],
                salario: arrayDatos[10],
                fecha_cierre: arrayDatos[11],
                estado: arrayDatos[12],
                referencia: this.referencia
            };

            $.post('http://next-job.lan/build/assets/php/gestion_procesos/edicion/editar_proceso.php', parametrosConsulta).done(function (respuesta){
                console.log(respuesta);
                console.log("Proceso editado");
            });
        },
        async popUpEditarProceso(){
            Swal.fire({
                title: "¿Confirmas la edición del proceso?",
                icon: "question",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: "#FFFFFF",
                confirmButtonText: "Editar",
                confirmButtonColor: "#2FB9CE",
                customClass: {
                    confirmButton: "boton_confirmar",
                    cancelButton: "boton_cancelar",
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    let datosFormulario = this.obtieneDatosFormulario();
                    this.actualizarProceso(datosFormulario);
                    this.popUpConfirmaEdicion();
                }
            });

            return false;
        },
        obtieneDatosFormulario(){
            let arrayDatosObtenidos = [];

            $(".input_formulario").each(function (index){
                if (index < 13){
                    arrayDatosObtenidos.push($(this).val());
                }
            });

            return arrayDatosObtenidos;
        },
    }
}
