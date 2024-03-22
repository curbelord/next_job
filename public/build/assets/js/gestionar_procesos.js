import proceso from "./proceso.js";
import numeracion_slider from "./numeracion_slider.js";


const app = Vue.createApp({
    data(){
        return {
            puesto_trabajo: "Puesto de prueba",
            ubicacion: "Lorem ipsum dolor sit amet",
            created_at: "22/03/2024",
            numero_candidatos: 8,
            numero_pagina: 1
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
                    <p>Nº procesos</p>
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

            <proceso :puesto_trabajo="puesto_trabajo" :ubicacion="ubicacion" :created_at="created_at" :numero_candidatos="numero_candidatos"></proceso>

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
        obtenerAlgo(){
            $.get('http://www.next-job.lan/build/assets/php/proceso.php', function(data){
                // Seguir con la obtención de datos
            });
        },
    },

}).mount('#container');
