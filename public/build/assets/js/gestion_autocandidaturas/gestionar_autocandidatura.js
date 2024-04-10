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
