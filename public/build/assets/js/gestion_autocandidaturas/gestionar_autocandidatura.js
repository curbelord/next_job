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
            <div id="numero_descartados">
                <div class="imagen_datos_candidatos_proceso_detalle imagen_descartados"></div>
                <div id="valor_numero_descartados">
                    <p>{{ datosAutocandidatura[2] }} descartados</p>
                </div>
            </div>
        </div>
    </div>

    <div id="container_procesos" v-if="gestionarProcesos">
        <div id="subcontainer_procesos">

            <div id="container_sin_ofertas">
                <div id="titulo_sin_ofertas">
                    <h3>No tienes pendiente ninguna autocandidatura</h3>
                </div>
            </div>
        </div>
    </div>

    <proceso_detalle v-if="procesoDetalle" @ocultarProcesoDetalle="quitarProcesoDetalle" @recargarCandidatosProcesoDetalle="recargaCandidatosProcesoDetalle" @anhadirCandidatos="anhadeCandidatosCompatibles" :referencia="datosAutocandidatura[3]" :puesto_trabajo="datosAutocandidatura[4]" :numero_candidatos="datosAutocandidatura[0]" :candidatos_preseleccionados_proceso="datosAutocandidatura[1]" :candidatos_descartados_proceso="datosAutocandidatura[2]" :estilo_container_candidato="estiloContainerCandidato" :estilo_curriculum_visible="estiloCurriculumVisible" :id_candidatos="id_candidatos" :nombre_o_id_candidatos="nombre_o_id_candidatos" :edad_o_experiencia_candidatos="edad_o_experiencia_candidatos" :fecha_publicacion_proceso="datosAutocandidatura[6]" :salario_proceso="datosAutocandidatura[9]" :jornada_proceso="datosAutocandidatura[10]" :turno_proceso="datosAutocandidatura[11]" :descripcion_oferta="datosAutocandidatura[8]" :curriculums_ciegos="datosAutocandidatura[7]" :gestion_autocandidatura="true"></proceso_detalle>
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

            let camposAAnhadir = ["referencia", "puesto_trabajo", "ubicacion", "fecha_creacion", "curriculums_ciegos", "descripcion", "salario", "jornada", "turno", "estado"];

            camposAAnhadir.forEach((elemento) => this.datosAutocandidatura.push(arrayDatos[0][`${elemento}`]));

            this.hayAutocandidatura = true;

            if (arrayDatos[0]["curriculums_ciegos"] == "SI"){
                this.estiloContainerCandidato = "padding:0px;";
                this.estiloCurriculumVisible = "display:none;";
            }
        },
        reseteaDatosAutocandidatura(){
            this.datosAutocandidatura = [];
            this.estiloContainerCandidato = "";
            this.estiloCurriculumVisible = "";
        },
        imprimeProcesoDetalleSiHayAutocandidatura(){
            if (this.hayAutocandidatura){
                this.gestionarProcesos = false;
                this.procesoDetalle = true;
            }
        },
        obtenerFechaActualFormateada(){
            let fechaActual = new Date();
            let anho = fechaActual.getFullYear();
            let mes = String(fechaActual.getMonth() + 1).padStart(2, '0');
            let dia = String(fechaActual.getDate()).padStart(2, '0');
            let hora = String(fechaActual.getHours()).padStart(2, '0');
            let minuto = String(fechaActual.getMinutes()).padStart(2, '0');
            let segundo = String(fechaActual.getSeconds()).padStart(2, '0');

            let fechaFormateada = `${anho}-${mes}-${dia} ${hora}:${minuto}:${segundo}`;

            return fechaFormateada;
        },

        // Métodos proceso_detalle

        popUpConfirmaAccionInsercionCandidatos(icono, mensaje){
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });
            Toast.fire({
                icon: icono,
                title: mensaje
            });
        },
        async anhadeCandidatosCompatibles(referenciaProceso, curriculumsCiegosSiNo){
            try {
                let datosCandidatos = await $.get('http://next-job.lan/build/assets/php/gestion_autocandidaturas/obtener_candidatos_compatibles.php?referencia=' + referenciaProceso + "&curriculumsCiegos=" + curriculumsCiegosSiNo);

                let objeto = '{"candidatos":[' + datosCandidatos.substring(0, datosCandidatos.length - 1) + "]}";

                if (objeto.indexOf("0 candidatos") == -1){
                    objeto = JSON.parse(objeto);
                    console.log(objeto["candidatos"]);

                    this.almacenaDatosCandidatos(objeto["candidatos"]);
                    await this.insertarCandidatosCompatiblesBBDD(objeto["candidatos"], referenciaProceso, objeto["candidatos"].length);
                    this.datosAutocandidatura[0] = objeto["candidatos"].length;
                }else{
                    this.popUpConfirmaAccionInsercionCandidatos("error", "No hay más candidatos compatibles");
                }

                return objeto;
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        async insertarCandidatosCompatiblesBBDD(arrayCandidatos, referenciaProceso, cantidadCandidatos){
            let parametroConsulta = "datos_candidatos=";

            for (let i = 0; i < arrayCandidatos.length; i++){
                parametroConsulta += "(" + arrayCandidatos[i]["id_candidato"] + "," + referenciaProceso + "," + "''" + ",'" + this.obtenerFechaActualFormateada() + "','" + this.obtenerFechaActualFormateada() + "'),";
            }

            parametroConsulta = parametroConsulta.substring(0, parametroConsulta.length - 1);

            try {
                let respuestaServidor = await $.post('http://next-job.lan/build/assets/php/gestion_autocandidaturas/insertar_candidatos_compatibles.php', parametroConsulta);

                if (respuestaServidor == "1"){
                    this.popUpConfirmaAccionInsercionCandidatos("success", `Se han añadido ${cantidadCandidatos} candidatos`);
                }

                console.log("Usuarios insertados correctamente");
            } catch (error) {
                console.error("Error al insertar los candidatos:", error);
            }
        },
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
        recargaCandidatosProcesoDetalle(){},
    },

}).mount('#container');

await app.obtenerAutocandidatura();
await app.imprimeProcesoDetalleSiHayAutocandidatura();
