import proceso from "./proceso.js";
import numeracion_slider from "./numeracion_slider.js";


const app = Vue.createApp({
    data(){
        return {
            numeroProcesos: 0,
            puesto_trabajo: [],
            ubicacion: [],
            fecha_creacion: [],
            numero_candidatos: [],
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
                <div class="imagen_datos_candidatos"></div>
                <div id="valor_numero_procesos">
                    <p>{{ numeroProcesos }} procesos</p>
                </div>
            </div>
            <div id="numero_candidatos">
                <div class="imagen_datos_candidatos"></div>
                <div id="valor_numero_candidatos">
                    <p>Nº candidatos</p>
                </div>
            </div>
            <div id="numero_preseleccionados">
                <div class="imagen_datos_candidatos"></div>
                <div id="valor_numero_preseleccionados">
                    <p>Nº preseleccionados</p>
                </div>
            </div>
        </div>
    </div>

    <div id="container_procesos">
        <div id="subcontainer_procesos">

            <proceso v-for="i in numeroProcesos" :key="i" :puesto_trabajo="puesto_trabajo[i - 1]" :ubicacion="ubicacion[i - 1]" :fecha_creacion="fecha_creacion[i - 1]" :numero_candidatos="numero_candidatos"></proceso>

            <div id="container_sin_ofertas">
                <div id="titulo_sin_ofertas">
                    <h3>No hay procesos</h3>
                </div>
            </div>
        </div>
    </div>

    <div id="container_slider_numeracion">
        <numeracion_slider :numero_pagina="numero_pagina"></numeracion_slider>
    </div>
    `,
    components: {
        proceso,
        numeracion_slider
    },
    methods: {
        async obtenerProcesos(){
            try {
                let datosProcesos = await $.get('http://next-job.lan/build/assets/php/proceso.php');

                let objeto = '{"procesos":[' + datosProcesos.substring(0, datosProcesos.length - 1) + "]}";
                objeto = JSON.parse(objeto);

                console.log(objeto["procesos"]);

                this.almacenaProcesosObtenidos(objeto["procesos"])
                this.actualizaCantidadProcesos(objeto["procesos"]);

                return objeto;
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        almacenaProcesosObtenidos(arrayProcesos){
            for (let i = 0; i < arrayProcesos.length; i++){
                this.puesto_trabajo.push(arrayProcesos[i]["puesto_trabajo"]);
                this.ubicacion.push(arrayProcesos[i]["ubicacion"]);
                this.fecha_creacion.push(arrayProcesos[i]["fecha_creacion"]);
            }
        },
        actualizaCantidadProcesos(arrayProcesos){
            for (let i = 0; i < arrayProcesos.length; i++){
                this.numeroProcesos++;
            }
        },
    },

}).mount('#container');

app.obtenerProcesos();
