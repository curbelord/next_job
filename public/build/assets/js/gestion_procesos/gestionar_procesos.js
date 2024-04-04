import proceso from "./proceso.js";
import numeracion_slider from "./numeracion_slider.js";
import proceso_detalle from "./proceso_detalle.js";
import curriculum_simplificado from "./curriculum_simplificado.js";


const app = Vue.createApp({
    data(){
        return {
            /* Datos propios */
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

            /* Se almacenan datos, pero no se usa */
            curriculums_ciegos: [],

            /* Datos componente numeracion_slider */
            numero_pagina: 1,
        }
    },
    template: `
    <div id="container_datos_top">
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

    <div id="container_procesos">
        <div id="subcontainer_procesos">

            <proceso @abrirProceso="imprimirProceso" v-for="i in referencia.length" :key="i" :referencia="referencia[i - 1]" :puesto_trabajo="puesto_trabajo[i - 1]" :ubicacion="ubicacion[i - 1]" :fecha_creacion="fecha_creacion[i - 1]" :numero_candidatos="numero_candidatos[i - 1]" :estado="estado[i - 1]"></proceso>

            <div id="container_sin_ofertas" v-if="numeroProcesos == 0">
                <div id="titulo_sin_ofertas">
                    <h3>No hay procesos</h3>
                </div>
            </div>
        </div>
    </div>

    <div id="container_slider_numeracion">
        <numeracion_slider v-for="i in (parseInt(numeroProcesos / 10) + 1)" @recargarProcesos="recargaProcesos" :key="i" :numero_pagina="i" :metodo_boton="'recargaProcesos'"></numeracion_slider>
    </div>

    <proceso_detalle v-if="procesoDetalle" @ocultarProcesoDetalle="quitarProcesoDetalle" @recargarCandidatosProcesoDetalle="recargaCandidatosProcesoDetalle" :referencia="referencia[posicionProcesoSeleccionado]" :puesto_trabajo="puesto_trabajo[posicionProcesoSeleccionado]" :numero_candidatos="numero_candidatos[posicionProcesoSeleccionado]" :candidatos_preseleccionados_proceso="candidatos_preseleccionados_proceso" :candidatos_descartados_proceso="candidatos_descartados_proceso" :estilo_container_candidato="estilo_container_candidato" :estilo_curriculum_visible="estilo_curriculum_visible" :id_candidatos="id_candidatos" :nombre_o_id_candidatos="nombre_o_id_candidatos" :edad_o_experiencia_candidatos="edad_o_experiencia_candidatos" :fecha_publicacion_proceso="fecha_publicacion_proceso" :salario_proceso="salario_proceso" :jornada_proceso="jornada_proceso" :turno_proceso="turno_proceso" :descripcion_oferta="descripcion_oferta" :curriculums_ciegos="curriculums_ciegos[posicionProcesoSeleccionado]"></proceso_detalle>
    `,
    components: {
        proceso,
        numeracion_slider,
        proceso_detalle,
        curriculum_simplificado
    },
    methods: {
        imprimirElementosGestionProcesos(){
            $("#container_datos_top").css("display", "grid");
            $("#container_procesos").css("display", "grid");
            $("#container_slider_numeracion").css("display", "flex");
        },
        async quitarProcesoDetalle(){
            this.procesoDetalle = false;
            this.reseteaValoresProcesoDetalle();
            // this.reseteaValoresProcesosObtenidos();  -> funcionalidad pendiente de adaptación por intervalos
            // this.obtenerProcesos();
            this.imprimirElementosGestionProcesos();
        },
        async obtenerProcesos(){
            try {
                let datosProcesos = await $.get('http://next-job.lan/build/assets/php/proceso.php?id_seleccionador=' + this.idSeleccionador + '&numero_offset=' + this.numeroOffset);

                let objeto = '{"procesos":[' + datosProcesos.substring(0, datosProcesos.length - 1) + "]}";
                objeto = JSON.parse(objeto);

                console.log(objeto["procesos"]);

                this.almacenaProcesosObtenidos(objeto["procesos"]);

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
        ocultaPanelPrincipal(){
            $("#container_datos_top").css("display", "none");
            $("#container_procesos").css("display", "none");
            $("#container_slider_numeracion").css("display", "none");
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
            try {
                let datosCandidatos = await $.get('http://next-job.lan/build/assets/php/proceso_detalle_candidatos.php?referencia=' + referenciaProceso + "&curriculumsCiegos=" + curriculumsCiegosSiNo + '&numero_offset=' + this.numeroOffsetProcesoDetalle);

                let objeto = '{"candidatos":[' + datosCandidatos.substring(0, datosCandidatos.length - 1) + "]}";

                if (objeto.indexOf("0 candidatos") == -1){
                    objeto = JSON.parse(objeto);
                    console.log(objeto["candidatos"]);
                    this.almacenaDatosCandidatosProcesoSeleccionado(objeto["candidatos"]);
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
            this.ocultaPanelPrincipal();
            this.obtenerDatosProcesoSeleccionado(referencia);
            this.obtenerDatosCandidatosProcesoSeleccionado(referencia, curriculumsCiegosSiNo);

            if (curriculumsCiegosSiNo == "SI"){
                this.estilo_container_candidato = "padding:0px;";
                this.estilo_curriculum_visible = "display:none;";
            }
            console.log(this.estilo_container_candidato, this.estilo_curriculum_visible);
            this.procesoDetalle = true;
            this.posicionProcesoSeleccionado = this.referencia.indexOf(referencia);
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
                        behavior: "smooth",
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
                    behavior: "smooth",
                });
            })
            .catch(error => {
                console.error("Error al obtener datos:", error);
            });
        },
    },

}).mount('#container');

app.obtenerProcesos();
