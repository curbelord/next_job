export default {
    props: ['id_seleccionador'],
    data(){
        return {
            // Vinculación de datos

            puestoTrabajo: "",
            ubicacion: "",
            tipoTrabajo: "",
            sector: "",
            descripcion: "",
            estudiosMinimos: "",
            experienciaMinima: 0,
            jornada: "",
            turno: "",
            numeroVacantes: 0,
            salario: 0,
            fechaCierre: "",
            curriculumsCiegos: "",

            // Datos para opciones estructuras <select>

            tiposTrabajo: ["Presencial", "Teletrabajo", "Mixto"],
            familiasProfesionales: ['Actividades Físicas y Deportivas', 'Administración y Gestión', 'Agroalimentario', 'Artes Gráficas', 'Construcción', 'Energía', 'Imagen Personal', 'Imagen y Sonido', 'Industrial', 'Informática y Comunicaciones', 'Logística, Transporte y Comercio', 'Mantenimiento', 'Medio Ambiente', 'Químico', 'Salud', 'Servicios Turísticos y Hosteleros', 'Textil'],
            estudios: ['Graduado Escolar', 'ESO', 'Bachillerato', 'Formación Profesional Básica', 'Ciclo Formativo de Grado Medio', 'Ciclo Formativo de Grado Superior', 'Enseñanzas artísticas', 'Enseñanzas deportivas', 'Licenciatura', 'Máster', 'Doctorado', 'Grado Universitario', 'No requerida'],
            turnos: ["Mañana", "Tarde", "Noche"],
        }
    },
    template: `
    <div id="container_publica_oferta">
        <div class="container_boton_volver">
            <button type="button" @click.prevent="avisoPadreOcultarPublicarProceso">Volver</button>
        </div>
        <div id="titulo_publica_oferta">
            <h3>Publica una oferta</h3>
        </div>

        <form method="POST" action="#">
            <input v-model="puestoTrabajo" type="text" id="titulo_crear_oferta" class="input_formulario" name="puesto_trabajo" placeholder="Título">

            <input v-model="ubicacion" type="text" id="centro_trabajo_oferta" class="input_formulario" name="ubicacion" placeholder="Ubicación del centro de trabajo">

            <div id="container_tipo_trabajo_sector">
                <select v-model="tipoTrabajo" id="tipo_trabajo_oferta" class="input_formulario" name="tipo_trabajo" placeholder="hola">
                    <option value="" disabled selected>Modalidad</option>
                    <option v-for="tipo in tiposTrabajo" :value="tipo">{{ tipo }}</option>
                </select>

                <select v-model="sector" id="sector_oferta" class="input_formulario" name="sector">
                    <option value="" disabled selected>Sector</option>
                    <option v-for="familia in familiasProfesionales" :value="familia">{{ familia }}</option>
                </select>
            </div>

            <textarea v-model="descripcion" rows="10" id="descripcion_crear_oferta" class="input_formulario" name="descripcion" placeholder="Descripción"></textarea>

            <div id="container_estudios_experiencia">
                <select v-model="estudiosMinimos" id="select_estudios_crear_oferta" class="input_formulario" name="estudios_minimos">
                    <option value="" disabled selected>Estudios mínimos</option>
                    <option v-for="estudio in estudios" :value="estudio">{{ estudio }}</option>
                </select>

                <input v-model="experienciaMinima" type="number" id="experiencia_crear_oferta" class="input_formulario" name="experiencia_minima" placeholder="Experiencia mínima" min="0">
            </div>

            <div id="container_jornada_turno">
                <select v-model="jornada" id="select_jornada_crear_oferta" class="input_formulario" name="jornada">
                    <option value="" disabled selected>Jornada</option>
                    <option :value="'Completa'">Completa</option>
                    <option :value="'Parcial'">Parcial</option>
                </select>

                <select v-model="turno" id="select_turno_crear_oferta" class="input_formulario" name="turno">
                    <option value="" disabled selected>Turno</option>
                    <option v-for="turnoActual in turnos" :value="turnoActual">{{ turnoActual }}</option>
                </select>
            </div>

            <div id="container_vacantes_salario">
                <input v-model="numeroVacantes" type="number" id="vacantes_crear_oferta" class="input_formulario" name="numero_vacantes" placeholder="Nº vacantes" min="1">

                <input v-model="salario" type="number" id="salario_crear_oferta" class="input_formulario" name="salario" placeholder="Salario">
            </div>

            <div id="container_cierre_cuestionario">
                <input v-model="fechaCierre" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="cierre_crear_oferta" class="input_formulario" name="fecha_cierre" placeholder="Fecha cierre">

                <select v-model="curriculumsCiegos" id="select_curriculums_ciegos_crear_oferta" class="input_formulario" name="curriculums_ciegos">
                    <option value="" disabled selected>Currículums ciegos</option>
                    <option :value="'SI'">Sí</option>
                    <option :value="'NO'">No</option>
                </select>
            </div>

            <div id="container_publicar_guardar_plantilla">
                <input @click.prevent="popUpConfirmaAccion('publicar', 'publicar_proceso')" name="publicada" type="button" id="enviar_oferta" class="input_formulario" value="Publicar">

                <input @click.prevent="popUpConfirmaAccion('guardar', 'guardar_plantilla_proceso')" name="plantilla" type="button" id="guardar_plantilla" class="input_formulario" value="Guardar plantilla">
            </div>
        </form>
    </div>
    `,
    methods: {
        avisoPadreOcultarPublicarProceso(){
            this.$emit('ocultarPublicarProceso');
        },
        obtenerFechaActual(){
            let fechaActual = new Date();

            let anho = fechaActual.getFullYear();
            let mes = (fechaActual.getMonth() + 1).toString().padStart(2, '0');
            let dia = fechaActual.getDate().toString().padStart(2, '0');

            let fechaFormateada = `${anho}-${mes}-${dia}`;

            return fechaFormateada;
        },
        obtenerHoraActual(){
            let fechaActual = new Date();

            let hora = fechaActual.getHours();
            let minuto = fechaActual.getMinutes();
            let segundo = fechaActual.getSeconds();

            let horaFormateada = `${hora}:${minuto}:${segundo}`;

            return horaFormateada;
        },
        async compruebaSiElementosVaciosFormulario(){
            $('.input_formulario').each(function() {
                let valor = '';

                if ($(this).is('input') || $(this).is('textarea')) {
                    valor = $(this).val().trim();
                }
                else if ($(this).is('select')) {
                    valor = $(this).find('option:selected').val().trim();
                }

                console.log(valor);

                if (valor == '') {
                    this.popUpElementosVaciosFormulario();
                }
            });
            return false;
        },
        popUpElementosVaciosFormulario(){
            Swal.fire({
                title: "Debes rellenar todos los campos del formulario",
                icon: "warning",
                confirmButtonText: "Vale",
                confirmButtonColor: "#2FB9CE",
                customClass: {
                    confirmButton: "boton_confirmar",
                },
            })
        },
        popUpConfirmaPublicacionOGuardadoProceso(publicadoOGuardado){
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });
            Toast.fire({
                icon: "success",
                title: `Proceso ${publicadoOGuardado} correctamente`
            });
        },
        async popUpConfirmaAccion(publicarOGuardar, nombreArchivo) {
            let elementosVaciosSiNo = await this.compruebaSiElementosVaciosFormulario();
            if (elementosVaciosSiNo == false){
                Swal.fire({
                    title: `¿Quieres ${publicarOGuardar} el proceso?`,
                    icon: publicarOGuardar == "publicar" ? "warning" : "question",
                    showCancelButton: true,
                    cancelButtonText: "Cancelar",
                    cancelButtonColor: "#FFFFFF",
                    confirmButtonText: `${publicarOGuardar.substring(0, 1).toUpperCase() + publicarOGuardar.substring(1, publicarOGuardar.length).toLowerCase()}`,
                    confirmButtonColor: "#2FB9CE",
                    customClass: {
                        confirmButton: "boton_confirmar",
                        cancelButton: "boton_cancelar",
                    },
                }).then(async (result) => {
                    if (result.isConfirmed){
                        await this.publicarOGuardarProceso(nombreArchivo);
                    }
                });
            }
        },
        async publicarOGuardarProceso(nombreArchivo){
            try{
                let fechaActual = await this.obtenerFechaActual();
                let horaActual = await this.obtenerHoraActual();
                let publicarOGuardar = nombreArchivo.indexOf("publicar") >= 0 ? "publicado" : "guardado";

                let parametrosConsulta = "puesto_trabajo=" + this.puestoTrabajo + "&ubicacion=" + this.ubicacion + "&tipo_trabajo=" + this.tipoTrabajo + "&sector=" + this.sector + "&descripcion=" + this.descripcion + "&estudios_minimos=" + this.estudiosMinimos + "&experiencia_minima=" + this.experienciaMinima + "&jornada=" + this.jornada + "&turno=" + this.turno + "&numero_vacantes=" + this.numeroVacantes + "&salario=" + this.salario + "&fecha_cierre=" + this.fechaCierre + "&curriculums_ciegos=" + this.curriculumsCiegos + "&id_seleccionador=" + this.id_seleccionador + "&created_at=" + (fechaActual + ' ' + horaActual) + "&updated_at=" + (fechaActual + ' ' + horaActual);

                await $.post(`http://next-job.lan/build/assets/php/publicar_proceso/${nombreArchivo}.php`, parametrosConsulta).done(function (){
                    console.log("Petición realizada correctamente");
                });

                await this.popUpConfirmaPublicacionOGuardadoProceso(publicarOGuardar);
                await this.avisoPadreOcultarPublicarProceso();
            }catch (error){
                console.error('Error al hacer la petición', error);
            }

        },
    }
}
