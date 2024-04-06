export default {
    data(){
        return {
            // Vinculación de datos

            puestoTrabajo: "",
            ubicacion: "",
            tipoTrabajo: "",
            sector: "",
            descripcion: "",
            estudiosMinimos: "",
            experienciaMinima: "",
            jornada: "",
            turno: "",
            numeroVacantes: "",
            salario: "",
            fechaCierre: "",
            estado: "",

            // Datos para opciones estructuras <select>

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
            <button type="button" @click.prevent="">Volver</button>
        </div>
        <div id="titulo_publica_oferta">
            <h3>Edita una oferta</h3>
        </div>

        <form method="POST" action="#">
            <input v-model="puestoTrabajo" type="text" id="titulo_crear_oferta" class="input_formulario" name="puesto_trabajo" placeholder="Título">

            <input v-model="ubicacion" type="text" id="centro_trabajo_oferta" class="input_formulario" name="ubicacion" placeholder="Ubicación del centro de trabajo">

            <div id="container_tipo_trabajo_sector">
                <select v-model="tipoTrabajo" id="tipo_trabajo_oferta" class="input_formulario" name="tipo_trabajo">
                    <option v-for="tipo in tiposTrabajo" :value="tipo">{{ tipo }}</option>
                </select>

                <select v-model="sector" id="sector_oferta" class="input_formulario" name="sector">
                    <option v-for="familia in familiasProfesionales" :value="familia">{{ familia }}</option>
                </select>
            </div>

            <textarea v-model="descripcion" rows="10" id="descripcion_crear_oferta" class="input_formulario" name="descripcion" placeholder="Descripción"></textarea>

            <div id="container_estudios_experiencia">
                <select v-model="estudiosMinimos" id="select_estudios_crear_oferta" class="input_formulario" name="estudios_minimos">
                    <option v-for="estudio in estudios" :value="estudio">{{ estudio }}</option>
                </select>

                <input v-model="experienciaMinima" type="number" id="experiencia_crear_oferta" class="input_formulario" name="experiencia_minima" placeholder="Experiencia mínima" min="0">
            </div>

            <div id="container_jornada_turno">
                <select v-model="jornada" id="select_jornada_crear_oferta" class="input_formulario" name="jornada">
                    <option :value="'Completa'">Completa</option>
                    <option :value="'Parcial'">Parcial</option>
                </select>

                <select v-model="jornada" id="select_turno_crear_oferta" class="input_formulario" name="turno">
                    <option v-for="turnoActual in turnos" :value="turnoActual">{{ turnoActual }}</option>
                </select>
            </div>

            <div id="container_vacantes_salario">
                <input v-model="numeroVacantes" type="number" id="vacantes_crear_oferta" class="input_formulario" name="numero_vacantes" placeholder="Nº vacantes" min="1">

                <input v-model="salario" type="number" id="salario_crear_oferta" class="input_formulario" name="salario" placeholder="Salario">
            </div>

            <div id="container_cierre_cuestionario">
                <input v-model="fechaCierre" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="cierre_crear_oferta" class="input_formulario" name="fecha_cierre" placeholder="Fecha cierre">

                <select v-model="estado" id="select_estado_crear_oferta" class="input_formulario" name="estado">
                    <option v-for="estadoActual in estados" :value="estadoActual">{{ estadoActual }}</option>
                </select>
            </div>

            <div id="container_publicar_guardar_plantilla">
                <input name="publicada" type="button" id="enviar_oferta" class="input_formulario" value="Publicar">

                <input name="plantilla" type="button" id="guardar_plantilla" class="input_formulario" value="Guardar plantilla">
            </div>
        </form>
    </div>
    `
}
