export default {
    props: ['puesto_trabajo', 'ubicacion', 'provincia', 'tipo_trabajo', 'sector', 'descripcion', 'estudios_minimos', 'experiencia_minima', 'jornada', 'turno', 'numero_vacantes', 'salario', 'fecha_cierre', 'estado', 'referencia'],
    data(){
        return {
            // Datos estructuras <select>

            tiposTrabajo: ["Presencial", "Teletrabajo", "Mixto"],
            familiasProfesionales: ['Actividades Físicas y Deportivas', 'Administración y Gestión', 'Agroalimentario', 'Artes Gráficas', 'Construcción', 'Energía', 'Imagen Personal', 'Imagen y Sonido', 'Industrial', 'Informática y Comunicaciones', 'Logística, Transporte y Comercio', 'Mantenimiento', 'Medio Ambiente', 'Químico', 'Salud', 'Servicios Turísticos y Hosteleros', 'Textil'],
            estudios: ['Graduado Escolar', 'ESO', 'Bachillerato', 'Formación Profesional Básica', 'Ciclo Formativo de Grado Medio', 'Ciclo Formativo de Grado Superior', 'Enseñanzas artísticas', 'Enseñanzas deportivas', 'Licenciatura', 'Máster', 'Doctorado', 'Grado Universitario', 'No requerida'],
            turnos: ["Mañana", "Tarde", "Noche"],
            estados: ["Publicada", "Plantilla", "Borrador"],
            provincias: ['Álava','Albacete','Alicante','Almería','Ávila','Badajoz','Baleares','Barcelona','Burgos','Cáceres','Cádiz','Castellón','Ciudad Real','Córdoba','Cuenca','Gerona','Granada','Guadalajara','Guipúzcoa','Huelva','Huesca','Jaén','La Coruña','La Rioja','Las Palmas','León','Lérida','Lugo','Madrid','Málaga','Murcia','Navarra','Orense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza','Ceuta','Melilla'],
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

        <form method="POST" action="#">
            <input type="text" id="titulo_crear_oferta" class="input_formulario" name="puesto_trabajo" placeholder="Título" :value="puesto_trabajo">

            <input type="text" id="centro_trabajo_oferta" class="input_formulario" name="ubicacion" placeholder="Ubicación del centro de trabajo" :value="ubicacion">

            <select id="provincia_oferta" class="input_formulario" name="provincia">
                <option v-for="provinciaActual in provincias" :value="provinciaActual" :selected="provincia == provinciaActual">{{ provinciaActual }}</option>
            </select>

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
                <input type="text" @focus="aplicaValorMinimoYMaximoInputFechaCierre(true)" @blur="aplicaValorMinimoYMaximoInputFechaCierre(false)" id="cierre_crear_oferta" class="input_formulario" name="fecha_cierre" placeholder="Fecha cierre" :value="fecha_cierre">

                <select id="select_estado_crear_oferta" class="input_formulario" name="estado">
                    <option v-for="estadoActual in estados" :value="estadoActual" :selected="estado == estadoActual">{{ estadoActual }}</option>
                </select>
            </div>

            <div id="container_publicar_guardar_borrador">
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
                provincia: arrayDatos[2],
                tipo_trabajo: arrayDatos[3],
                sector: arrayDatos[4],
                descripcion: arrayDatos[5],
                estudios_minimos: arrayDatos[6],
                experiencia_minima: arrayDatos[7],
                jornada: arrayDatos[8],
                turno: arrayDatos[9],
                numero_vacantes: arrayDatos[10],
                salario: arrayDatos[11],
                fecha_cierre: arrayDatos[12],
                estado: arrayDatos[13],
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
                    this.$emit('retornarGestionProcesos');
                }
            });

            return false;
        },
        obtieneDatosFormulario(){
            let arrayDatosObtenidos = [];

            $(".input_formulario").each(function (index){
                if (index < 14){
                    arrayDatosObtenidos.push($(this).val());
                }
            });

            return arrayDatosObtenidos;
        },
        aplicaValorMinimoYMaximoInputFechaCierre(esFocus) {
            let fechaMinima = this.obtenerFechaActual();
            let fechaMaxima = this.obtenerFechaLimiteCaducidad();
            let inputFecha = document.getElementById("cierre_crear_oferta");

            if (esFocus) {
                inputFecha.type = "date";
                inputFecha.setAttribute("min", fechaMinima);
                inputFecha.setAttribute("max", fechaMaxima);
            } else {
                inputFecha.type = "text";
            }
        },
        obtenerFechaActual(){
            let fechaActual = new Date();
            let anho = fechaActual.getFullYear();
            let mes = fechaActual.getMonth() + 1;
            let dia = fechaActual.getDate();

            if (mes < 10) {
                mes = '0' + mes;
            }
            if (dia < 10) {
                dia = '0' + dia;
            }

            return anho + '-' + mes + '-' + dia;
        },
        obtenerFechaLimiteCaducidad(){
            let fechaActual = new Date();
            let fechaLimite = new Date(fechaActual.getTime() + 15 * 24 * 60 * 60 * 1000);
            let anho = fechaLimite.getFullYear();
            let mes = fechaLimite.getMonth() + 1;
            let dia = fechaLimite.getDate();

            if (mes < 10) {
                mes = '0' + mes;
            }
            if (dia < 10) {
                dia = '0' + dia;
            }

            return anho + '-' + mes + '-' + dia;
        },
    }
}
