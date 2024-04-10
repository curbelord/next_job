import numeracion_slider from "../gestion_procesos/numeracion_slider.js";
import proceso_detalle from "../gestion_procesos/proceso_detalle.js";
import curriculum_simplificado from "../gestion_procesos/curriculum_simplificado.js";


const app = Vue.createApp({
    data(){
        return {
            /* Datos propios */

            gestionarProcesos: true,
            hayAutocandidatura: false,
            idSeleccionador: sessionStorage.getItem("id_seleccionador") ? sessionStorage.getItem("id_seleccionador") : 2,
            numeroOffset: 0,
            datosAutocandidatura: [],

            /* Datos proceso_detalle */

            procesoDetalle: false,
            estiloContainerCandidato: "padding:0px;",
            estiloCurriculumVisible: "display:none;",
            numeroOffsetProcesoDetalle: 0,
            nombre_o_id_candidatos: [],
            edad_o_experiencia_candidatos: [],
            id_candidatos: [],
        }
    },
    template: `
    <div id="container_datos_top" v-if="gestionarProcesos">
        <div class="container_boton_volver">
            <a href="http://next-job.lan/vue/principal/procesos">Volver</a>
        </div>
        <div id="titulo_gestion_procesos">
            <h3>Gestión de autocandidatura</h3>
        </div>
        <div id="datos_candidatos">
            <div id="numero_candidatos">
                <div class="imagen_datos_candidatos imagen_candidatos"></div>
                <div id="valor_numero_candidatos">
                    <p>{{ datosAutocandidatura[0] }} candidatos</p>
                </div>
            </div>
            <div id="numero_preseleccionados">
                <div class="imagen_datos_candidatos imagen_preseleccionados"></div>
                <div id="valor_numero_preseleccionados">
                    <p>{{ datosAutocandidatura[1] }} preseleccionados</p>
                </div>
            </div>
        </div>
    </div>

    <div id="container_procesos" v-if="gestionarProcesos">
        <div id="subcontainer_procesos">

            <div id="container_sin_ofertas" v-if="hayAutocandidatura == false">
                <div id="titulo_sin_ofertas">
                    <h3>No tienes pendiente ninguna autocandidatura</h3>
                </div>
            </div>
        </div>
    </div>

    <proceso_detalle v-if="procesoDetalle" @ocultarProcesoDetalle="quitarProcesoDetalle" @recargarCandidatosProcesoDetalle="recargaCandidatosProcesoDetalle" :referencia="datosAutocandidatura[3]" :puesto_trabajo="datosAutocandidatura[4]" :numero_candidatos="datosAutocandidatura[0]" :candidatos_preseleccionados_proceso="datosAutocandidatura[1]" :candidatos_descartados_proceso="datosAutocandidatura[2]" :estilo_container_candidato="estiloContainerCandidato" :estilo_curriculum_visible="estiloCurriculumVisible" :id_candidatos="id_candidatos" :nombre_o_id_candidatos="nombre_o_id_candidatos" :edad_o_experiencia_candidatos="edad_o_experiencia_candidatos" :fecha_publicacion_proceso="datosAutocandidatura[6]" :salario_proceso="datosAutocandidatura[9]" :jornada_proceso="datosAutocandidatura[10]" :turno_proceso="datosAutocandidatura[11]" :descripcion_oferta="datosAutocandidatura[8]" :curriculums_ciegos="datosAutocandidatura[7]"></proceso_detalle>
    `,
    components: {
        numeracion_slider,
        proceso_detalle,
        curriculum_simplificado,
    },
    methods: {
        // Métodos propios

        async obtenerAutocandidatura(){
            try {
                let datosAutocandidatura = await $.get('http://next-job.lan/build/assets/php/gestion_autocandidaturas/obtener_autocandidatura.php?id_seleccionador=' + this.idSeleccionador);

                let objeto = '{"autocandidatura":[' + datosAutocandidatura.substring(0, datosAutocandidatura.length - 1) + "]}";

                if (objeto.indexOf("0 resultados") == -1){
                    objeto = JSON.parse(objeto);
                    console.log(objeto["autocandidatura"]);
                    this.almacenaAutocandidatura(objeto["autocandidatura"]);
                    await this.obtenerDatosCandidatos(objeto["autocandidatura"][0]["referencia"], objeto["autocandidatura"][0]["curriculums_ciegos"]);
                }

                return objeto;
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        almacenaAutocandidatura(arrayDatos){
            this.datosAutocandidatura.push(parseInt(arrayDatos[0]["candidatos_inscritos"]));
            arrayDatos[0]["candidatos_preseleccionados"] == "" ? this.datosAutocandidatura.push(0) : this.datosAutocandidatura.push(parseInt(arrayDatos[0]["candidatos_preseleccionados"]));
            arrayDatos[0]["candidatos_descartados"] == "" ? this.datosAutocandidatura.push(0) : this.datosAutocandidatura.push(arrayDatos[0]["candidatos_descartados"]);

            this.datosAutocandidatura.push(arrayDatos[0]["referencia"]);
            this.datosAutocandidatura.push(arrayDatos[0]["puesto_trabajo"]);
            this.datosAutocandidatura.push(arrayDatos[0]["ubicacion"]);
            this.datosAutocandidatura.push(arrayDatos[0]["fecha_creacion"]);
            this.datosAutocandidatura.push(arrayDatos[0]["curriculums_ciegos"]);

            this.datosAutocandidatura.push(arrayDatos[0]["descripcion"]);
            this.datosAutocandidatura.push(arrayDatos[0]["salario"]);
            this.datosAutocandidatura.push(arrayDatos[0]["jornada"]);
            this.datosAutocandidatura.push(arrayDatos[0]["turno"]);
            this.datosAutocandidatura.push(arrayDatos[0]["estado"]);

            this.hayAutocandidatura = true;

            if (arrayDatos[0]["curriculums_ciegos"] == "SI"){
                this.estiloContainerCandidato = "padding:0px;";
                this.estiloCurriculumVisible = "display:none;";
            }
        },
        imprimeProcesoDetalleSiHayAutocandidatura(){
            if (this.hayAutocandidatura){
                this.gestionarProcesos = false;
                this.procesoDetalle = true;
            }
        },

        // Métodos proceso_detalle

        async obtenerDatosCandidatos(referenciaProceso, curriculumsCiegosSiNo){
            try {
                let datosCandidatos = await $.get('http://next-job.lan/build/assets/php/gestion_autocandidaturas/obtener_candidatos.php?referencia=' + referenciaProceso + "&curriculumsCiegos=" + curriculumsCiegosSiNo + '&numero_offset=' + this.numeroOffsetProcesoDetalle);

                let objeto = '{"candidatos":[' + datosCandidatos.substring(0, datosCandidatos.length - 1) + "]}";

                if (objeto.indexOf("0 candidatos") == -1){
                    objeto = JSON.parse(objeto);
                    console.log(objeto["candidatos"]);
                    this.almacenaDatosCandidatos(objeto["candidatos"]);
                }

                return objeto;
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        almacenaDatosCandidatos(arrayDatos){
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
        quitarProcesoDetalle(){
            location.href = "http://next-job.lan/vue/principal/procesos";
        },
        recargaCandidatosProcesoDetalle(){

        },
    },

}).mount('#container');

await app.obtenerAutocandidatura();
await app.imprimeProcesoDetalleSiHayAutocandidatura();























// imprimirGestionProcesos(){
        //     this.gestionarProcesos = true;
        // },
        // async quitarProcesoDetalle(){
        //     this.procesoDetalle = false;
        //     this.reseteaValoresProcesoDetalle();
        //     this.reseteaValoresProcesosObtenidos();
        //     this.obtenerProcesos();
        //     this.imprimirGestionProcesos();
        // },
        // async obtenerProcesos(){
        //     try {
        //         let datosProcesos = await $.get('http://next-job.lan/build/assets/php/gestion_autocandidaturas/obtener_procesos.php?id_seleccionador=' + this.idSeleccionador + '&numero_offset=' + this.numeroOffset);

        //         let objeto = '{"procesos":[' + datosProcesos.substring(0, datosProcesos.length - 1) + "]}";

        //         if (objeto.indexOf("0 resultados") == -1){
        //             objeto = JSON.parse(objeto);
        //             console.log(objeto["procesos"]);
        //             this.almacenaProcesosObtenidos(objeto["procesos"]);
        //         }

        //         return objeto;
        //     } catch (error) {
        //         console.error('Error al hacer la petición', error);
        //     }
        // },
        // reseteaValoresProcesosObtenidos(){
        //     this.referencia = [];
        //     this.puesto_trabajo = [];
        //     this.ubicacion = [];
        //     this.fecha_creacion = [];
        //     this.numero_candidatos = [];
        //     this.curriculums_ciegos = [];
        //     this.estado = [];
        //     this.candidatos_preseleccionados = 0;
        //     this.candidatos_totales = 0;
        //     this.numeroProcesos = 0;
        // },
        // reseteaValoresProcesoDetalle(){
        //     this.posicionProcesoSeleccionado = 0;
        //     this.candidatos_preseleccionados_proceso = 0;
        //     this.candidatos_descartados_proceso = 0;
        //     this.estilo_container_candidato = "";
        //     this.estilo_curriculum_visible = "";
        //     this.id_candidatos = [];
        //     this.nombre_o_id_candidatos = [];
        //     this.edad_o_experiencia_candidatos = [];
        //     this.fecha_publicacion_proceso = "";
        //     this.salario_proceso = 0;
        //     this.jornada_proceso = "";
        //     this.turno_proceso = "";
        //     this.descripcion_oferta = "";
        // },
        // almacenaProcesosObtenidos(arrayProcesos){
        //     for (let i = 0; i < arrayProcesos.length; i++){
        //         this.referencia.push(arrayProcesos[i]["referencia"]);
        //         this.puesto_trabajo.push(arrayProcesos[i]["puesto_trabajo"]);
        //         this.ubicacion.push(arrayProcesos[i]["ubicacion"]);
        //         this.fecha_creacion.push(arrayProcesos[i]["fecha_creacion"]);
        //         this.numero_candidatos.push(parseInt(arrayProcesos[i]["candidatos_inscritos"]));
        //         this.curriculums_ciegos.push(arrayProcesos[i]["curriculums_ciegos"]);
        //         this.estado.push(arrayProcesos[i]["estado"]);

        //         if (arrayProcesos[i]["candidatos_preseleccionados"] != NaN && arrayProcesos[i]["candidatos_preseleccionados"] != "" && arrayProcesos[i]["candidatos_preseleccionados"] != undefined){
        //             this.candidatos_preseleccionados += parseInt(arrayProcesos[i]["candidatos_preseleccionados"]);
        //         }
        //     }
        //     this.candidatos_totales = this.numero_candidatos.reduce((acumulador, valorActual) => acumulador + valorActual);
        //     this.numeroProcesos = arrayProcesos[0]["cantidad_total_ofertas"];
        // },
        // ocultaGestionProcesos(){
        //     this.gestionarProcesos = false;
        // },
        // async obtenerDatosProcesoSeleccionado(referenciaProceso){
        //     try {
        //         let datosProceso = await $.get('http://next-job.lan/build/assets/php/proceso_detalle.php?referencia=' + referenciaProceso);

        //         let objeto = '{"proceso":[' + datosProceso.substring(0, datosProceso.length - 1) + "]}";
        //         objeto = JSON.parse(objeto);

        //         console.log(objeto["proceso"]);

        //         this.almacenaDatosProcesoSeleccionado(objeto["proceso"]);

        //         return objeto;
        //     } catch (error) {
        //         console.error('Error al hacer la petición', error);
        //     }
        // },
        // async obtenerDatosCandidatosProcesoSeleccionado(referenciaProceso, curriculumsCiegosSiNo){
        //     try {
        //         let datosCandidatos = await $.get('http://next-job.lan/build/assets/php/proceso_detalle_candidatos.php?referencia=' + referenciaProceso + "&curriculumsCiegos=" + curriculumsCiegosSiNo + '&numero_offset=' + this.numeroOffsetProcesoDetalle);

        //         let objeto = '{"candidatos":[' + datosCandidatos.substring(0, datosCandidatos.length - 1) + "]}";

        //         if (objeto.indexOf("0 candidatos") == -1){
        //             objeto = JSON.parse(objeto);
        //             console.log(objeto["candidatos"]);
        //             this.almacenaDatosCandidatosProcesoSeleccionado(objeto["candidatos"]);
        //         }

        //         return objeto;
        //     } catch (error) {
        //         console.error('Error al hacer la petición', error);
        //     }
        // },
        // almacenaDatosProcesoSeleccionado(arrayDatos){
        //     this.candidatos_preseleccionados_proceso = parseInt(arrayDatos[0]["candidatos_preseleccionados"]);
        //     this.candidatos_descartados_proceso = parseInt(arrayDatos[0]["candidatos_descartados"]);

        //     let fechaATipoDate = new Date(arrayDatos[0]["oferta_fecha_publicacion"]);
        //     this.fecha_publicacion_proceso = fechaATipoDate.toLocaleDateString("es-ES");

        //     this.salario_proceso = arrayDatos[0]["oferta_salario"];
        //     this.jornada_proceso = arrayDatos[0]["oferta_jornada"];
        //     this.turno_proceso = arrayDatos[0]["oferta_turno"];
        //     this.descripcion_oferta = arrayDatos[0]["descripcion_oferta"];
        // },
        // almacenaDatosCandidatosProcesoSeleccionado(arrayDatos){
        //     if (arrayDatos.indexOf("0 candidatos") == - 1){
        //         for (let i = 0; i < arrayDatos.length; i++){
        //             if (arrayDatos[i]["nombre_o_id_candidato"]){
        //                 this.nombre_o_id_candidatos.push(arrayDatos[i]["nombre_o_id_candidato"]);
        //             }else{
        //                 this.nombre_o_id_candidatos.push(arrayDatos[i]["id_candidato"]);
        //             }
        //             this.edad_o_experiencia_candidatos.push(parseInt(arrayDatos[i]["edad_o_experiencia_candidato"]));
        //             this.id_candidatos.push(arrayDatos[i]["id_candidato"]);
        //         }
        //     }
        // },
        // imprimirProceso(referencia){
        //     let curriculumsCiegosSiNo = this.curriculums_ciegos[this.referencia.indexOf(referencia)];
        //     this.ocultaGestionProcesos();
        //     this.obtenerDatosProcesoSeleccionado(referencia);
        //     this.obtenerDatosCandidatosProcesoSeleccionado(referencia, curriculumsCiegosSiNo);

        //     if (curriculumsCiegosSiNo == "SI"){
        //         this.estilo_container_candidato = "padding:0px;";
        //         this.estilo_curriculum_visible = "display:none;";
        //     }
        //     console.log(this.estilo_container_candidato, this.estilo_curriculum_visible);
        //     this.procesoDetalle = true;
        //     this.posicionProcesoSeleccionado = this.referencia.indexOf(referencia);
        //     window.scrollTo({
        //         top: 0,
        //         left: 0,
        //     });
        // },
        // limpiaDatosProcesosObtenidos(){
        //     this.referencia = [];
        //     this.puesto_trabajo = []
        //     this.ubicacion = []
        //     this.fecha_creacion = []
        //     this.numero_candidatos = []
        //     this.curriculums_ciegos = []
        // },
        // limpiaDatosCandidatosObtenidos(){
        //     this.id_candidatos = [];
        //     this.nombre_o_id_candidatos = [];
        //     this.edad_o_experiencia_candidatos = [];
        // },
        // recargaProcesos(numeroPagina){
        //     if (numeroPagina != this.numero_pagina){
        //         this.numeroOffset = (numeroPagina * 10) - 10;
        //         this.limpiaDatosProcesosObtenidos();
        //         this.obtenerProcesos()
        //         .then(() => {
        //             window.scrollTo({
        //                 top: 0,
        //                 left: 0,
        //             });
        //         })
        //         .catch(error => {
        //             console.error("Error al obtener datos:", error);
        //         });
        //         this.numero_pagina = numeroPagina;
        //     }
        // },
        // recargaCandidatosProcesoDetalle(numeroPagina, referencia, curriculumsCiegos){
        //     this.numeroOffsetProcesoDetalle = (numeroPagina * 10) - 10;
        //     this.limpiaDatosCandidatosObtenidos();
        //     this.obtenerDatosCandidatosProcesoSeleccionado(referencia, curriculumsCiegos)
        //     .then(() => {
        //         window.scrollTo({
        //             top: 0,
        //             left: 0,
        //         });
        //     })
        //     .catch(error => {
        //         console.error("Error al obtener datos:", error);
        //     });
        // },
        // async seleccionaProceso(referencia){
        //     this.reseteaValoresProcesosObtenidos();
        //     this.imprimirProceso(referencia);
        // },
