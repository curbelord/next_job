import proceso from "./proceso.js";
import numeracion_slider from "./numeracion_slider.js";
import proceso_detalle from "./proceso_detalle.js";
import curriculum_simplificado from "./curriculum_simplificado.js";
import editar_proceso from "./edicion/editar_proceso.js";


const app = Vue.createApp({
    data(){
        return {
            /* Datos propios */
            gestionarProcesos: true,
            numeroProcesos: 0,
            candidatos_totales: 0,
            candidatos_preseleccionados: 0,
            idSeleccionador: sessionStorage.getItem("id_seleccionador") ? sessionStorage.getItem("id_seleccionador") : 2,
            numeroOffset: 0,

            /* Datos componente proceso */
            ubicacion: [],
            fecha_creacion: [],
            estado: [],

            /* Datos componente proceso_detalle */
            procesoDetalle: false,
            posicionProcesoSeleccionado: 0,
            candidatos_preseleccionados_proceso: 0,
            candidatos_descartados_proceso: 0,
            estilo_container_candidato: "",
            estilo_curriculum_visible: "",
            id_candidatos: [],
            nombre_o_id_candidatos: [],
            edad_o_experiencia_candidatos: [],
            fecha_publicacion_proceso: "",
            salario_proceso: 0,
            jornada_proceso: "",
            turno_proceso: "",
            descripcion_oferta: "",
            numeroOffsetProcesoDetalle: 0,

            /* Datos componentes proceso/proceso_detalle */
            referencia: [],
            puesto_trabajo: [],
            numero_candidatos: [],
            curriculums_ciegos: [],

            /* Datos componente numeracion_slider */
            numero_pagina: 1,

            /* Datos componente editar_proceso */
            editarProceso: false,
            datosProcesoEdicion: [],
        }
    },
    template: `
    <div id="container_datos_top" v-if="gestionarProcesos">
        <div class="container_boton_volver">
            <a href="http://next-job.lan/vue/principal/procesos">Volver</a>
        </div>
        <div id="titulo_gestion_procesos">
            <h3>Gestión de procesos</h3>
        </div>
        <div id="datos_candidatos">
            <div id="numero_procesos">
                <div class="imagen_datos_candidatos imagen_procesos"></div>
                <div id="valor_numero_procesos">
                    <p>{{ numeroProcesos }} procesos</p>
                </div>
            </div>
            <div id="numero_candidatos">
                <div class="imagen_datos_candidatos imagen_candidatos"></div>
                <div id="valor_numero_candidatos">
                    <p>{{ candidatos_totales }} candidatos</p>
                </div>
            </div>
            <div id="numero_preseleccionados">
                <div class="imagen_datos_candidatos imagen_preseleccionados"></div>
                <div id="valor_numero_preseleccionados">
                    <p>{{ candidatos_preseleccionados }} preseleccionados</p>
                </div>
            </div>
        </div>
    </div>

    <div id="container_procesos" v-if="gestionarProcesos">
        <div id="subcontainer_procesos">

            <proceso @abrirProceso="imprimirProceso" @editarProceso="editaProceso" @eliminarProceso="popUpEliminaProceso" v-for="i in referencia.length" :key="i" :referencia="referencia[i - 1]" :puesto_trabajo="puesto_trabajo[i - 1]" :ubicacion="ubicacion[i - 1]" :fecha_creacion="fecha_creacion[i - 1]" :numero_candidatos="numero_candidatos[i - 1]" :estado="estado[i - 1]"></proceso>

            <div id="container_sin_ofertas" v-if="numeroProcesos == 0">
                <div id="titulo_sin_ofertas">
                    <h3>No hay procesos</h3>
                </div>
            </div>
        </div>
    </div>

    <div id="container_slider_numeracion" v-if="gestionarProcesos">
        <numeracion_slider v-for="i in (numeroProcesos <= 10 ? 1 : parseInt(numeroProcesos / 10) + 1)" @recargarProcesos="recargaProcesos" :key="i" :numero_pagina="i" :metodo_boton="'recargaProcesos'"></numeracion_slider>
    </div>

    <proceso_detalle v-if="procesoDetalle" @ocultarProcesoDetalle="quitarProcesoDetalle" @recargarCandidatosProcesoDetalle="recargaCandidatosProcesoDetalle" @filtrarCandidatos="filtroCandidatos" :referencia="referencia[posicionProcesoSeleccionado]" :puesto_trabajo="puesto_trabajo[posicionProcesoSeleccionado]" :numero_candidatos="numero_candidatos[posicionProcesoSeleccionado]" :candidatos_preseleccionados_proceso="candidatos_preseleccionados_proceso" :candidatos_descartados_proceso="candidatos_descartados_proceso" :estilo_container_candidato="estilo_container_candidato" :estilo_curriculum_visible="estilo_curriculum_visible" :id_candidatos="id_candidatos" :nombre_o_id_candidatos="nombre_o_id_candidatos" :edad_o_experiencia_candidatos="edad_o_experiencia_candidatos" :fecha_publicacion_proceso="fecha_publicacion_proceso" :salario_proceso="salario_proceso" :jornada_proceso="jornada_proceso" :turno_proceso="turno_proceso" :descripcion_oferta="descripcion_oferta" :curriculums_ciegos="curriculums_ciegos[posicionProcesoSeleccionado]" :gestion_autocandidatura="false"></proceso_detalle>

    <editar_proceso v-if="editarProceso" @ocultarEditarProceso="ocultaEditarProceso" @retornarGestionProcesos="retornaGestionProcesos" :puesto_trabajo="datosProcesoEdicion[0]" :ubicacion="datosProcesoEdicion[1]" :tipo_trabajo="datosProcesoEdicion[2]" :sector="datosProcesoEdicion[3]" :descripcion="datosProcesoEdicion[4]" :estudios_minimos="datosProcesoEdicion[5]" :experiencia_minima="datosProcesoEdicion[6]" :jornada="datosProcesoEdicion[7]" :turno="datosProcesoEdicion[8]" :numero_vacantes="datosProcesoEdicion[9]" :salario="datosProcesoEdicion[10]" :fecha_cierre="datosProcesoEdicion[11]" :estado="datosProcesoEdicion[12]" :referencia="datosProcesoEdicion[13]"></editar_proceso>
    `,
    components: {
        proceso,
        numeracion_slider,
        proceso_detalle,
        curriculum_simplificado,
        editar_proceso
    },
    methods: {
        async eliminaProceso(referenciaEntrante) {
            let parametroConsulta = {
                referencia: referenciaEntrante,
            };

            try {
                await $.post('http://next-job.lan/build/assets/php/gestion_procesos/eliminacion/eliminar_proceso.php', parametroConsulta);
                console.log("Proceso eliminado");
            } catch (error) {
                console.error("Error al eliminar el proceso:", error);
            }
        },
        popUpConfirmaEliminacionProceso(){
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });
            Toast.fire({
                icon: "success",
                title: "Proceso eliminado correctamente"
            });
        },
        async popUpEliminaProceso(referenciaEntrante) {
            Swal.fire({
                title: "¿Confirmas la eliminación del proceso?",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: "#FFFFFF",
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#2FB9CE",
                customClass: {
                    confirmButton: "boton_confirmar",
                    cancelButton: "boton_cancelar",
                },
            }).then(async (result) => {
                if (result.isConfirmed){
                    this.reseteaValoresProcesosObtenidos();
                    await this.eliminaProceso(referenciaEntrante);
                    this.popUpConfirmaEliminacionProceso();
                    this.obtenerProcesos();
                }
            });
        },
        async retornaGestionProcesos(){
            try {
                this.datosProcesoEdicion = [];
                this.reseteaValoresProcesosObtenidos();
                await this.obtenerProcesos();
                this.ocultaEditarProceso();
                window.scrollTo({
                    top: 0,
                    left: 0,
                });
            } catch (error) {
                console.error("Error al retornar la gestión de procesos:", error);
            }
        },
        ocultaEditarProceso(){
            this.editarProceso = false;
            this.imprimirGestionProcesos();
        },
        imprimirGestionProcesos(){
            this.gestionarProcesos = true;
        },
        async filtroCandidatos(referenciaProceso, filtro, curriculumsCiegosSiNo, numeroCandidatos){
            try{
                let numeroCandidatosPeticion = "";
                this.numeroOffsetProcesoDetalle = 0;

                if (filtro.toLowerCase() == "todos"){
                    numeroCandidatosPeticion = await this.obtenerDatosCandidatosProcesoSeleccionado(referenciaProceso, curriculumsCiegosSiNo);

                }else if(filtro.toLowerCase() == "preseleccionados"){
                    numeroCandidatosPeticion = await this.obtenerCandidatosSegunFiltro(referenciaProceso, curriculumsCiegosSiNo, "AND inscripcion.id_oferta = estado.id_oferta AND estado.id_demandante IN (SELECT id_demandante FROM estado WHERE nombre = 'Preseleccionado') AND estado.id_demandante NOT IN (SELECT id_demandante FROM estado WHERE nombre = 'Descartado')");

                }else if(filtro.toLowerCase() == "descartados"){
                    numeroCandidatosPeticion = await this.obtenerCandidatosSegunFiltro(referenciaProceso, curriculumsCiegosSiNo, "AND inscripcion.id_oferta = estado.id_oferta AND estado.id_demandante IN (SELECT id_demandante FROM estado WHERE nombre = 'Descartado') AND estado.id_demandante NOT IN (SELECT id_demandante FROM estado WHERE nombre = 'Preseleccionado')");
                }

                if (numeroCandidatosPeticion && numeroCandidatosPeticion.candidatos) {
                    this.numero_candidatos.splice(this.referencia.indexOf(referenciaProceso), 1, numeroCandidatosPeticion["candidatos"].length);
                }else if (numeroCandidatosPeticion.indexOf('0 candidatos') == -1){
                    this.numero_candidatos.splice(this.referencia.indexOf(referenciaProceso), 1, parseInt(numeroCandidatosPeticion));
                }else if (numeroCandidatosPeticion.indexOf('0 candidatos') > 0){
                    this.numero_candidatos.splice(this.referencia.indexOf(referenciaProceso), 1, 0);
                }

            }catch (error){
                console.error("Error al hacer la petición:", error);
            }
        },
        async obtenerCandidatosSegunFiltro(referenciaProceso, curriculumsCiegosSiNo, filtro){
            try {
                let datosCandidatos = await $.get('http://next-job.lan/build/assets/php/filtro_candidatos_proceso_detalle.php?referencia=' + referenciaProceso + "&curriculumsCiegos=" + curriculumsCiegosSiNo + "&filtro=" + filtro + '&numero_offset=' + this.numeroOffsetProcesoDetalle);

                let objeto = '{"candidatos":[' + datosCandidatos.substring(0, datosCandidatos.length - 1) + "]}";

                if (objeto.indexOf("0 candidatos") == -1){
                    objeto = JSON.parse(objeto);
                    console.log(objeto["candidatos"]);
                    this.almacenaDatosCandidatosFiltrados(objeto["candidatos"]);
                }else{
                    this.nombre_o_id_candidatos = [];
                    this.edad_o_experiencia_candidatos = [];
                    this.id_candidatos = [];
                }

                return objeto;
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        almacenaDatosCandidatosFiltrados(arrayDatos){
            this.nombre_o_id_candidatos = [];
            this.edad_o_experiencia_candidatos = [];
            this.id_candidatos = [];

            let copiaValorIterador = 0;

            for (let i = 0; i < arrayDatos.length; i++){
                if (arrayDatos[i]["nombre_o_id_candidato"]){
                    this.nombre_o_id_candidatos.push(arrayDatos[i]["nombre_o_id_candidato"]);
                }else{
                    this.nombre_o_id_candidatos.push(arrayDatos[i]["id_candidato"]);
                }
                this.edad_o_experiencia_candidatos.push(parseInt(arrayDatos[i]["edad_o_experiencia_candidato"]));
                this.id_candidatos.push(arrayDatos[i]["id_candidato"]);

                copiaValorIterador++;
            }
            return copiaValorIterador;
        },
        async quitarProcesoDetalle(){
            this.procesoDetalle = false;
            this.reseteaValoresProcesoDetalle();
            this.reseteaValoresProcesosObtenidos();
            this.obtenerProcesos();
            this.imprimirGestionProcesos();
        },
        async obtenerProcesos(){
            try {
                let datosProcesos = await $.get('http://next-job.lan/build/assets/php/proceso.php?id_seleccionador=' + this.idSeleccionador + '&numero_offset=' + this.numeroOffset);

                let objeto = '{"procesos":[' + datosProcesos.substring(0, datosProcesos.length - 1) + "]}";

                if (objeto.indexOf("0 resultados") == -1){
                    objeto = JSON.parse(objeto);
                    console.log(objeto["procesos"]);
                    this.almacenaProcesosObtenidos(objeto["procesos"]);
                }

                return objeto;
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        reseteaValoresProcesosObtenidos(){
            this.referencia = [];
            this.puesto_trabajo = [];
            this.ubicacion = [];
            this.fecha_creacion = [];
            this.numero_candidatos = [];
            this.curriculums_ciegos = [];
            this.estado = [];
            this.candidatos_preseleccionados = 0;
            this.candidatos_totales = 0;
            this.numeroProcesos = 0;
        },
        reseteaValoresProcesoDetalle(){
            this.posicionProcesoSeleccionado = 0;
            this.candidatos_preseleccionados_proceso = 0;
            this.candidatos_descartados_proceso = 0;
            this.estilo_container_candidato = "";
            this.estilo_curriculum_visible = "";
            this.id_candidatos = [];
            this.nombre_o_id_candidatos = [];
            this.edad_o_experiencia_candidatos = [];
            this.fecha_publicacion_proceso = "";
            this.salario_proceso = 0;
            this.jornada_proceso = "";
            this.turno_proceso = "";
            this.descripcion_oferta = "";
        },
        almacenaProcesosObtenidos(arrayProcesos){
            for (let i = 0; i < arrayProcesos.length; i++){
                this.referencia.push(arrayProcesos[i]["referencia"]);
                this.puesto_trabajo.push(arrayProcesos[i]["puesto_trabajo"]);
                this.ubicacion.push(arrayProcesos[i]["ubicacion"]);
                this.fecha_creacion.push(arrayProcesos[i]["fecha_creacion"]);
                this.numero_candidatos.push(parseInt(arrayProcesos[i]["candidatos_inscritos"]));
                this.curriculums_ciegos.push(arrayProcesos[i]["curriculums_ciegos"]);
                this.estado.push(arrayProcesos[i]["estado"]);

                if (arrayProcesos[i]["candidatos_preseleccionados"] != NaN && arrayProcesos[i]["candidatos_preseleccionados"] != "" && arrayProcesos[i]["candidatos_preseleccionados"] != undefined){
                    this.candidatos_preseleccionados += parseInt(arrayProcesos[i]["candidatos_preseleccionados"]);
                }
            }
            this.candidatos_totales = this.numero_candidatos.reduce((acumulador, valorActual) => acumulador + valorActual);
            this.numeroProcesos = arrayProcesos[0]["cantidad_total_ofertas"];
        },
        ocultaGestionProcesos(){
            this.gestionarProcesos = false;
        },
        async obtenerDatosProcesoSeleccionado(referenciaProceso){
            try {
                let datosProceso = await $.get('http://next-job.lan/build/assets/php/proceso_detalle.php?referencia=' + referenciaProceso);

                let objeto = '{"proceso":[' + datosProceso.substring(0, datosProceso.length - 1) + "]}";
                objeto = JSON.parse(objeto);

                console.log(objeto["proceso"]);

                this.almacenaDatosProcesoSeleccionado(objeto["proceso"]);

                return objeto;
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        async obtenerDatosCandidatosProcesoSeleccionado(referenciaProceso, curriculumsCiegosSiNo){
            this.nombre_o_id_candidatos = [];
            this.edad_o_experiencia_candidatos = [];
            this.id_candidatos = [];
            try {
                let datosCandidatos = await $.get('http://next-job.lan/build/assets/php/proceso_detalle_candidatos.php?referencia=' + referenciaProceso + "&curriculumsCiegos=" + curriculumsCiegosSiNo + '&numero_offset=' + this.numeroOffsetProcesoDetalle);

                let objeto = '{"candidatos":[' + datosCandidatos.substring(0, datosCandidatos.length - 1) + "]}";

                if (objeto.indexOf("0 candidatos") == -1){
                    objeto = JSON.parse(objeto);
                    console.log(objeto["candidatos"]);
                    this.almacenaDatosCandidatosProcesoSeleccionado(objeto["candidatos"]);
                    return objeto["candidatos"][0]["numero_inscritos"];
                }

                return objeto;
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        almacenaDatosProcesoSeleccionado(arrayDatos){
            this.candidatos_preseleccionados_proceso = parseInt(arrayDatos[0]["candidatos_preseleccionados"]);
            this.candidatos_descartados_proceso = parseInt(arrayDatos[0]["candidatos_descartados"]);

            let fechaATipoDate = new Date(arrayDatos[0]["oferta_fecha_publicacion"]);
            this.fecha_publicacion_proceso = fechaATipoDate.toLocaleDateString("es-ES");

            this.salario_proceso = arrayDatos[0]["oferta_salario"];
            this.jornada_proceso = arrayDatos[0]["oferta_jornada"];
            this.turno_proceso = arrayDatos[0]["oferta_turno"];
            this.descripcion_oferta = arrayDatos[0]["descripcion_oferta"];
        },
        almacenaDatosCandidatosProcesoSeleccionado(arrayDatos){
            if (arrayDatos.indexOf("0 candidatos") == - 1){
                for (let i = 0; i < arrayDatos.length; i++){
                    if (arrayDatos[i]["nombre_o_id_candidato"]){
                        this.nombre_o_id_candidatos.push(arrayDatos[i]["nombre_o_id_candidato"]);
                    }else{
                        this.nombre_o_id_candidatos.push(arrayDatos[i]["id_candidato"]);
                    }
                    this.edad_o_experiencia_candidatos.push(parseInt(arrayDatos[i]["edad_o_experiencia_candidato"]));
                    this.id_candidatos.push(arrayDatos[i]["id_candidato"]);
                }
            }
        },
        imprimirProceso(referencia){
            let curriculumsCiegosSiNo = this.curriculums_ciegos[this.referencia.indexOf(referencia)];
            this.ocultaGestionProcesos();
            this.obtenerDatosProcesoSeleccionado(referencia);
            this.obtenerDatosCandidatosProcesoSeleccionado(referencia, curriculumsCiegosSiNo);

            if (curriculumsCiegosSiNo == "SI"){
                this.estilo_container_candidato = "padding:0px;";
                this.estilo_curriculum_visible = "display:none;";
            }
            console.log(this.estilo_container_candidato, this.estilo_curriculum_visible);
            this.procesoDetalle = true;
            this.posicionProcesoSeleccionado = this.referencia.indexOf(referencia);
            window.scrollTo({
                top: 0,
                left: 0,
            });
        },
        limpiaDatosProcesosObtenidos(){
            this.referencia = [];
            this.puesto_trabajo = []
            this.ubicacion = []
            this.fecha_creacion = []
            this.numero_candidatos = []
            this.curriculums_ciegos = []
        },
        limpiaDatosCandidatosObtenidos(){
            this.id_candidatos = [];
            this.nombre_o_id_candidatos = [];
            this.edad_o_experiencia_candidatos = [];
        },
        recargaProcesos(numeroPagina){
            if (numeroPagina != this.numero_pagina){
                this.numeroOffset = (numeroPagina * 10) - 10;
                this.limpiaDatosProcesosObtenidos();
                this.obtenerProcesos()
                .then(() => {
                    window.scrollTo({
                        top: 0,
                        left: 0,
                    });
                })
                .catch(error => {
                    console.error("Error al obtener datos:", error);
                });
                this.numero_pagina = numeroPagina;
            }
        },
        recargaCandidatosProcesoDetalle(numeroPagina, referencia, curriculumsCiegos){
            this.numeroOffsetProcesoDetalle = (numeroPagina * 10) - 10;
            this.limpiaDatosCandidatosObtenidos();
            this.obtenerDatosCandidatosProcesoSeleccionado(referencia, curriculumsCiegos)
            .then(() => {
                window.scrollTo({
                    top: 0,
                    left: 0,
                });
            })
            .catch(error => {
                console.error("Error al obtener datos:", error);
            });
        },

        // Métodos componente editar_proceso

        almacenaDatosProcesoEdicion(arrayProceso, referencia){
            let arrayClavesDatos = ["puesto_trabajo", "ubicacion", "provincia", "tipo_trabajo", "sector", "descripcion", "estudios_minimos", "experiencia_minima", "jornada", "turno", "numero_vacantes", "salario", "fecha_cierre", "estado"];

            arrayClavesDatos.forEach((clave) => this.datosProcesoEdicion.push(arrayProceso[0][clave]));
            this.datosProcesoEdicion.push(referencia);
        },
        async obtenerDatosProcesoEdicion(referencia){
            try {
                let datosProceso = await $.get('http://next-job.lan/build/assets/php/gestion_procesos/edicion/obtener_proceso.php?referencia=' + referencia);

                let objeto = '{"proceso":[' + datosProceso.substring(0, datosProceso.length - 1) + "]}";

                if (objeto.indexOf("0 resultados") == -1){
                    objeto = JSON.parse(objeto);
                    console.log(objeto["proceso"]);
                    this.almacenaDatosProcesoEdicion(objeto["proceso"], referencia);
                }

                return objeto;
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        editaProceso(referencia){
            this.obtenerDatosProcesoEdicion(referencia);
            this.ocultaGestionProcesos();
            this.editarProceso = true;
        },
    },

}).mount('#container');

app.obtenerProcesos();
