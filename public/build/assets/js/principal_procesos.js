import ultimo_proceso from "./ultimo_proceso.js";
import publicar_proceso from "./publicacion_proceso/publicar_proceso.js";

const app = Vue.createApp({
    data(){
        return {
            // Datos propios

            principalProcesos: true,
            ultimosProcesos: [],
            idSeleccionador: this.obtenerIdSeleccionador(),
            nombreSeleccionador: "",
            generoSeleccionador: "",

            // Datos componente publicar_proceso

            publicarProceso: false,
        }
    },
    components: {
        ultimo_proceso,
        publicar_proceso
    },
    template: `
    <div id="container_bienvenida_seleccionador" v-if="principalProcesos">
        <h3 v-if="generoSeleccionador == 'Hombre'">Bienvenido, {{ nombreSeleccionador }}</h3>
        <h3 v-else-if="generoSeleccionador == 'Mujer'">Bienvenida, {{ nombreSeleccionador }}</h3>
        <h3 v-else>Bienvenid@, {{ nombreSeleccionador }}</h3>
        <p>¿Qué quieres hacer?</p>
    </div>

    <div id="container_seccion_gestion" v-if="principalProcesos">
        <div id="bloque_gestion_1" class="bloque_gestion">
            <div class="imagen_gestion imagen_publicar_proceso">
                <button type="button" @click.prevent="muestraPublicarProceso"></button>
            </div>
            <div class="texto_gestion">
                <button type="button" @click.prevent="muestraPublicarProceso">Publicar proceso</button>
            </div>
        </div>
        <div id="bloque_gestion_2" class="bloque_gestion">
            <div class="imagen_gestion imagen_gestionar_procesos">
                <a href="http://next-job.lan/gestionar/procesos"></a>
            </div>
            <div class="texto_gestion">
                <a href="http://next-job.lan/gestionar/procesos">Gestionar procesos</a>
            </div>
        </div>
        <div id="bloque_gestion_3" class="bloque_gestion">
            <div class="imagen_gestion imagen_gestionar_autocandidaturas">
                <a href="http://next-job.lan/gestionar/autocandidatura"></a>
            </div>
            <div class="texto_gestion">
                <a href="http://next-job.lan/gestionar/autocandidatura">Autocandidaturas</a>
            </div>
        </div>
    </div>

    <div id="container_ultimos_procesos" v-if="principalProcesos">
        <div id="titulo_ultimos_procesos">
            <h3>Últimos procesos</h3>
        </div>
        <div id="subcontainer_ultimos_procesos">

            <ultimo_proceso v-for="i in ultimosProcesos.length" :key="i" :puesto_trabajo="ultimosProcesos[i - 1][0]" :ubicacion="ultimosProcesos[i - 1][1]" :fecha_publicacion="ultimosProcesos[i - 1][2]" :numero_inscritos="ultimosProcesos[i - 1][3]" :numero_preseleccionados="ultimosProcesos[i - 1][4]" :numero_descartados="ultimosProcesos[i - 1][5]"></ultimo_proceso>

            <div class="container_oferta" v-if="ultimosProcesos.length == 0">
                <div class="datos_top">
                    <div class="titulo_oferta">
                        <h3>No hay procesos</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <publicar_proceso v-if="publicarProceso" @ocultarPublicarProceso="ocultaPublicarProceso" :id_seleccionador="idSeleccionador"></publicar_proceso>
    `,
    methods: {
        // Métodos componente publicar_proceso

        muestraPublicarProceso(){
            this.ocultaPrincipalProcesos();
            this.publicarProceso = true;
            this.scrollHaciaTop();

            localStorage.setItem('pagina_impresa', 'publicar_proceso');
        },

        // Métodos propios

        obtenerIdSeleccionador(){
            let etiquetaScript = document.querySelector('script[src="http://next-job.lan/build/assets/js/principal_procesos.js"]');
            let idSeleccionador = parseInt(etiquetaScript.dataset.id);
            return idSeleccionador;
        },
        avisoErrorPeticion(){
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });
            Toast.fire({
                icon: "error",
                title: "Se ha producido un error"
            });
        },
        ocultaPublicarProceso(){
            this.publicarProceso = false;
            this.muestraPrincipalProcesos();
            this.scrollHaciaTop();
        },
        imprimePrincipalProcesosOPublicarProceso(){
            let entraEnCondicional = false;

            if (localStorage.getItem('pagina_impresa') != undefined){
                if (localStorage.getItem('pagina_impresa') == 'publicar_proceso'){
                    this.ocultaPrincipalProcesos();
                    this.muestraPublicarProceso();
                }
                else{
                    this.ocultaPublicarProceso();
                    this.muestraPrincipalProcesos();
                }
                entraEnCondicional = true;
            }

            this.obtenerNombreYGeneroSeleccionador();
            if (entraEnCondicional){
                return true;
            }
            this.ocultaPublicarProceso();
            this.muestraPrincipalProcesos();
        },
        scrollHaciaTop(){
            window.scrollTo({
                top: 0,
                left: 0,
            });
        },
        almacenaNombreYGeneroSeleccionador(arrayDatos){
            this.nombreSeleccionador = arrayDatos[0]["nombre_seleccionador"];
            this.generoSeleccionador = arrayDatos[0]["genero_seleccionador"];
        },
        almacenaProcesosObtenidos(arrayProcesos){
            for (let i = 0; i < arrayProcesos.length; i++){
                this.ultimosProcesos.push([arrayProcesos[i]["puesto_trabajo"], arrayProcesos[i]["ubicacion"], arrayProcesos[i]["fecha_publicacion"], parseInt(arrayProcesos[i]["candidatos_inscritos"]), arrayProcesos[i]["candidatos_preseleccionados"] == "" ? 0 : arrayProcesos[i]["candidatos_preseleccionados"], arrayProcesos[i]["candidatos_descartados"] == "" ? 0 : arrayProcesos[i]["candidatos_descartados"]]);
            }
            console.log(this.nombreSeleccionador);
        },
        async obtenerNombreYGeneroSeleccionador(){
            try {
                let datosSeleccionador = await $.get('http://next-job.lan/build/assets/php/obtener_nombre_genero_seleccionador.php?id_seleccionador=' + this.idSeleccionador).fail(() => {
                    this.avisoErrorPeticion();
                });

                if (datosSeleccionador.indexOf("0 resultados") == -1){
                    let objeto = '{"datosSeleccionador":[' + datosSeleccionador.substring(0, datosSeleccionador.length - 1) + "]}";
                    objeto = JSON.parse(objeto);
                    console.log(objeto["datosSeleccionador"]);

                    this.almacenaNombreYGeneroSeleccionador(objeto["datosSeleccionador"]);
                    this.obtenerUltimosProcesos();

                    return objeto;
                }
            } catch (error) {
                console.error('Se ha producido un error', error);
            }
        },
        async obtenerUltimosProcesos(){
            try {
                let datosProcesos = await $.get('http://next-job.lan/build/assets/php/obtener_ultimos_procesos.php?id_seleccionador=' + this.idSeleccionador).fail(() => {
                    this.avisoErrorPeticion();
                });

                if (datosProcesos.indexOf("0 resultados") == -1){
                    let objeto = '{"procesos":[' + datosProcesos.substring(0, datosProcesos.length - 1) + "]}";
                    objeto = JSON.parse(objeto);
                    console.log(objeto["procesos"]);

                    this.almacenaProcesosObtenidos(objeto["procesos"]);

                    return objeto;
                }

            } catch (error) {
                console.error('Se ha producido un error', error);
            }
        },
        ocultaPrincipalProcesos(){
            this.principalProcesos = false;
        },
        muestraPrincipalProcesos(){
            this.principalProcesos = true;
            localStorage.setItem('pagina_impresa', 'principal_procesos');
        },
    }
}).mount('#container');

// app.obtenerNombreYGeneroSeleccionador();
app.imprimePrincipalProcesosOPublicarProceso();
