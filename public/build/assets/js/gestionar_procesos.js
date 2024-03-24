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
            candidatos_totales: 0,
            candidatos_preseleccionados: 0,
            numero_pagina: 1,
            procesoDetalle: false,
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

    <proceso_detalle v-if="procesoDetalle"></proceso_detalle>
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
        imprimirProceso(referencia){
            $("#container_datos_top").css("display", "none");
            $("#container_procesos").css("display", "none");
            $("#container_slider_numeracion").css("display", "none");

            this.procesoDetalle = true;
        },
    },

}).mount('#container');

app.obtenerProcesos();
