import proceso from "./proceso.js";
import numeracion_slider from "./numeracion_slider.js";
import proceso_detalle from "./proceso_detalle.js";
import curriculum_simplificado from "./curriculum_simplificado.js";


const app = Vue.createApp({
    data(){
        return {
            numeroProcesos: 0,
            referencia: [],
            puesto_trabajo: [],
            ubicacion: [],
            fecha_creacion: [],
            numero_candidatos: [],
            curriculums_ciegos: [],
            candidatos_totales: 0,
            candidatos_preseleccionados: 0,
            numero_pagina: 1,
            procesoDetalle: false,
            posicionProcesoSeleccionado: 0,
            candidatos_preseleccionados_proceso: 0,
            candidatos_descartados_proceso: 0,
            estilo_container_candidato: "",
            estilo_curriculum_visible: "",
            url_curriculum: "a",
            url_nota: "a",
            url_ojo: "a",
            id_candidatos: [],
            nombre_o_id_candidatos: [],
            edad_o_experiencia_candidatos: [],
            fecha_publicacion_proceso: "",
            salario_proceso: 0,
            jornada_proceso: "",
            turno_proceso: "",
            descripcion_oferta: "",
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

            <proceso @abrirProceso="imprimirProceso" v-for="i in numeroProcesos" :key="i" :referencia="referencia[i - 1]" :puesto_trabajo="puesto_trabajo[i - 1]" :ubicacion="ubicacion[i - 1]" :fecha_creacion="fecha_creacion[i - 1]" :numero_candidatos="numero_candidatos[i - 1]"></proceso>

            <div id="container_sin_ofertas" v-if="numeroProcesos == 0">
                <div id="titulo_sin_ofertas">
                    <h3>No hay procesos</h3>
                </div>
            </div>
        </div>
    </div>

    <div id="container_slider_numeracion">
        <numeracion_slider :numero_pagina="numero_pagina"></numeracion_slider>
    </div>

    <proceso_detalle v-if="procesoDetalle" :referencia="referencia[posicionProcesoSeleccionado]" :puesto_trabajo="puesto_trabajo[posicionProcesoSeleccionado]" :numero_candidatos="numero_candidatos[posicionProcesoSeleccionado]" :candidatos_preseleccionados_proceso="candidatos_preseleccionados_proceso" :candidatos_descartados_proceso="candidatos_descartados_proceso" :estilo_container_candidato="estilo_container_candidato" :estilo_curriculum_visible="estilo_curriculum_visible" :url_curriculum="url_curriculum" :url_nota="url_nota" :url_ojo="url_ojo" :id_candidatos="id_candidatos" :nombre_o_id_candidatos="nombre_o_id_candidatos" :edad_o_experiencia_candidatos="edad_o_experiencia_candidatos" :fecha_publicacion_proceso="fecha_publicacion_proceso" :salario_proceso="salario_proceso" :jornada_proceso="jornada_proceso" :turno_proceso="turno_proceso" :descripcion_oferta="descripcion_oferta"></proceso_detalle>
    `,
    components: {
        proceso,
        numeracion_slider,
        proceso_detalle,
        curriculum_simplificado
    },
    methods: {
        async obtenerProcesos(){
            try {
                let datosProcesos = await $.get('http://next-job.lan/build/assets/php/proceso.php');

                let objeto = '{"procesos":[' + datosProcesos.substring(0, datosProcesos.length - 1) + "]}";
                objeto = JSON.parse(objeto);

                console.log(objeto["procesos"]);

                this.almacenaProcesosObtenidos(objeto["procesos"]);
                this.actualizaCantidadProcesos(objeto["procesos"]);

                return objeto;
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        almacenaProcesosObtenidos(arrayProcesos){
            for (let i = 0; i < arrayProcesos.length; i++){
                this.referencia.push(arrayProcesos[i]["referencia"]);
                this.puesto_trabajo.push(arrayProcesos[i]["puesto_trabajo"]);
                this.ubicacion.push(arrayProcesos[i]["ubicacion"]);
                this.fecha_creacion.push(arrayProcesos[i]["fecha_creacion"]);
                this.numero_candidatos.push(parseInt(arrayProcesos[i]["candidatos_inscritos"]));
                this.curriculums_ciegos.push(parseInt(arrayProcesos[i]["curriculums_ciegos"]));

                if (arrayProcesos[i]["candidatos_preseleccionados"] != NaN && arrayProcesos[i]["candidatos_preseleccionados"] != "" && arrayProcesos[i]["candidatos_preseleccionados"] != undefined){
                    this.candidatos_preseleccionados += parseInt(arrayProcesos[i]["candidatos_preseleccionados"]);
                }
            }
            this.candidatos_totales = this.numero_candidatos.reduce((acumulador, valorActual) => acumulador + valorActual);
        },
        actualizaCantidadProcesos(arrayProcesos){
            for (let i = 0; i < arrayProcesos.length; i++){
                this.numeroProcesos++;
            }
        },
        ocultaPanelPrincipal(){
            $("#container_datos_top").css("display", "none");
            $("#container_procesos").css("display", "none");
            $("#container_slider_numeracion").css("display", "none");
        },
        async obtenerDatosProcesoSeleccionado(referenciaProceso, curriculumsCiegosSiNo){
            try {
                let datosProceso = await $.get('http://next-job.lan/build/assets/php/proceso_detalle.php?referencia=' + referenciaProceso + "&curriculumsCiegos=" + curriculumsCiegosSiNo);

                let objeto = '{"proceso":[' + datosProceso.substring(0, datosProceso.length - 1) + "]}";
                objeto = JSON.parse(objeto);

                console.log(objeto["proceso"]);

                this.almacenaDatosProcesoSeleccionado(objeto["proceso"]);

                return objeto;
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        almacenaDatosProcesoSeleccionado(arrayDatos){
            this.candidatos_preseleccionados_proceso = parseInt(arrayDatos[0]["candidatos_preseleccionados"]);
            this.candidatos_descartados_proceso = parseInt(arrayDatos[0]["candidatos_descartados"]);

            for (let i = 0; i < arrayDatos.length; i++){
                if (arrayDatos[i]["nombre_o_id_candidatos"]){
                    this.nombre_o_id_candidatos.push(arrayDatos[i]["nombre_o_id_candidatos"]);
                }else{
                    this.nombre_o_id_candidatos.push(i);
                }
                this.edad_o_experiencia_candidatos.push(arrayDatos[i]["edad_o_experiencia_candidatos"]);
                this.id_candidatos.push(arrayDatos[i]["id_candidato"]);
            }

            let fechaATipoDate = new Date(arrayDatos[0]["oferta_fecha_publicacion"]);

            this.fecha_publicacion_proceso = fechaATipoDate.toLocaleDateString("es-ES");
            this.salario_proceso = arrayDatos[0]["oferta_salario"];
            this.jornada_proceso = arrayDatos[0]["oferta_jornada"];
            this.turno_proceso = arrayDatos[0]["oferta_turno"];
            this.descripcion_oferta = arrayDatos[0]["descripcion_oferta"];
        },
        imprimirProceso(referencia){
            let curriculumsCiegosSiNo = this.curriculums_ciegos[this.referencia.indexOf(referencia)];
            this.ocultaPanelPrincipal();
            this.obtenerDatosProcesoSeleccionado(referencia, curriculumsCiegosSiNo);

            if (curriculumsCiegosSiNo == "SI"){
                this.estilo_container_candidato = "padding:0px;";
                this.estilo_curriculum_visible = "display:none;";
            }
            console.log(this.estilo_container_candidato, this.estilo_curriculum_visible);
            this.procesoDetalle = true;
            this.posicionProcesoSeleccionado = this.referencia.indexOf(referencia);
        },
    },

}).mount('#container');

app.obtenerProcesos();


// PENDIENTE - AÑADIR ACCESO A NOTA Y A LA VISUALIZACIÓN DEL CANDIDATO DENTRO DEL CURRÍCULUM SIMPLIFICADO
