import curriculum_simplificado from "./curriculum_simplificado.js";
import curriculum from "./curriculum.js";
import numeracion_slider from "./numeracion_slider.js";

export default {
    data(){
        return {
            numeroOffset: 0,
            numeroLimiteCandidatos: 20,
            curriculumVisible: false,
            numeroPagina: 1,
            filtroSeleccionado: "todos",

            // Datos componente "curriculum"

            id_candidato: "",
            nombre: "",
            fecha_nacimiento: "",
            direccion_postal: "",
            telefono: "",
            email: "",
            nombre_estado: "",
            fecha_ultimo_estado: "",
            nombre_experiencia: [],
            empresa_experiencia: [],
            fecha_inicio_experiencia: [],
            fecha_fin_experiencia: [],
            descripcion_experiencia: [],
            nombre_formacion: [],
            centro_formacion: [],
            fecha_inicio_formacion: [],
            fecha_fin_formacion: [],
        }
    },
    props: ['referencia', 'puesto_trabajo', 'numero_candidatos', 'candidatos_preseleccionados_proceso', 'candidatos_descartados_proceso', 'estilo_container_candidato', 'estilo_curriculum_visible', 'nombre_o_id_candidatos', 'edad_o_experiencia_candidatos', 'fecha_publicacion_proceso', 'salario_proceso', 'jornada_proceso', 'turno_proceso', 'id_candidatos', 'descripcion_oferta', 'curriculums_ciegos', 'gestion_autocandidatura'],
    components: {
        curriculum_simplificado,
        curriculum,
        numeracion_slider,
    },
    template: `
    <div id="container_proceso_detalle">
        <div id="container_datos_top_proceso_detalle">
            <div class="container_boton_volver">
                <button type="button" @click.prevent="avisoPadreOcultarProcesoDetalle">Volver</button>
            </div>
            <div id="titulo_datos_procesos_proceso_detalle">
                <h3>#{{ referencia }} &nbsp; {{ puesto_trabajo }}</h3>
            </div>
            <div id="datos_candidatos_proceso_detalle">
                <div id="numero_candidatos">
                    <div class="imagen_datos_candidatos_proceso_detalle imagen_candidatos"></div>
                    <div id="valor_numero_candidatos">
                        <p>{{ numero_candidatos }} candidatos</p>
                    </div>
                </div>
                <div id="numero_preseleccionados">
                    <div class="imagen_datos_candidatos_proceso_detalle imagen_preseleccionados"></div>
                    <div id="valor_numero_preseleccionados">
                        <p>{{ candidatos_preseleccionados_proceso }} preseleccionados</p>
                    </div>
                </div>
                <div id="numero_descartados">
                    <div class="imagen_datos_candidatos_proceso_detalle imagen_descartados"></div>
                    <div id="valor_numero_descartados">
                        <p>{{ candidatos_descartados_proceso }} descartados</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="container_candidatos">
            <div id="titulo_candidatos">
                <h3>Candidatos</h3>

                <div id="container_filtro_candidatos">
                    <select @change="avisoPadreFiltroCandidatos" v-model="filtroSeleccionado" id="select_filtro_candidatos" class="input_formulario" style="margin-bottom: 0px;">
                        <option value="todos" selected>Todos</option>
                        <option value="preseleccionados">Preseleccionados</option>
                        <option value="descartados">Descartados</option>
                    </select>
                </div>

                <div id="container_boton_anhadir_candidatos" v-if="gestion_autocandidatura">
                    <button type="button" @click.prevent="avisoPadreAnhadirCandidatos">Añadir candidatos</button>
                </div>
            </div>



            <div id="container_info_candidatos">
                <div id="subcontainer_info_candidatos">

                    <curriculum_simplificado @impresionCurriculum="imprimirCurriculum" v-for="i in nombre_o_id_candidatos.length" :key="i" :i="i" :id_oferta="referencia" :id_candidato="id_candidatos[i - 1]" :estilo_container_candidato="estilo_container_candidato" :estilo_curriculum_visible="estilo_curriculum_visible" :nombre_o_id_candidatos="nombre_o_id_candidatos" :edad_o_experiencia_candidatos="edad_o_experiencia_candidatos"></curriculum_simplificado>

                    <div id="container_sin_candidatos" v-if="numero_candidatos == 0">
                        <div id="titulo_sin_candidatos">
                            <h3>No hay candidatos</h3>
                        </div>
                    </div>

                </div>
            </div>

            <div id="container_slider_numeracion">
                <numeracion_slider v-for="i in (parseInt(numero_candidatos) <= 10 ? 0 : parseInt(numero_candidatos / 10) + 1)" @avisarPadreRecargaCandidatos="avisoPadreRecargaCandidatos" :key="i" :numero_pagina="i" :metodo_boton="'recargaCandidatos'"></numeracion_slider>
            </div>
        </div>

        <div id="container_descripcion">
            <div id="titulo_descripcion">
                <h3>Descripción del proceso</h3>
            </div>
            <div id="container_info_descripcion">
                <div id="subcontainer_info_descripcion">
                    <p>{{ descripcion_oferta }}</p>
                </div>
            </div>

            <div id="container_datos_bottom">
                <div id="datos_bottom_fila_1">
                    <div id="fecha_publicacion" class="boton_outline_azul">
                        <p>{{ fecha_publicacion_proceso }}</p>
                    </div>
                    <div id="salario" class="boton_outline_azul">
                        <p>{{ salario_proceso }} €</p>
                    </div>
                </div>
                <div id="datos_bottom_fila_2">
                    <div id="jornada" class="boton_outline_azul">
                        <p>{{ jornada_proceso }}</p>
                    </div>
                    <div id="horario" class="boton_outline_azul">
                        <p>{{ turno_proceso }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <curriculum v-if="curriculumVisible" @ocultarCurriculum="quitarCurriculum" :id_candidato="id_candidato" :id_oferta="referencia" :nombre="nombre" :fecha_nacimiento="fecha_nacimiento" :direccion_postal="direccion_postal" :telefono="telefono" :email="email" :nombre_estado="nombre_estado" :fecha_ultimo_estado="fecha_ultimo_estado" :nombre_experiencia="nombre_experiencia" :empresa_experiencia="empresa_experiencia" :fecha_inicio_experiencia="fecha_inicio_experiencia" :fecha_fin_experiencia="fecha_fin_experiencia" :descripcion_experiencia="descripcion_experiencia" :nombre_formacion="nombre_formacion" :centro_formacion="centro_formacion" :fecha_inicio_formacion="fecha_inicio_formacion" :fecha_fin_formacion="fecha_fin_formacion" :curriculums_ciegos="curriculums_ciegos"></curriculum>
    `,
    emits: ['ocultarProcesoDetalle', 'recargarCandidatosProcesoDetalle', 'anhadirCandidatos', 'filtrarCandidatos'],
    methods: {
        // Método gestionar_autocandidatura

        avisoPadreAnhadirCandidatos(){
            this.$emit('anhadirCandidatos', this.referencia, this.curriculums_ciegos);
        },

        // Métodos gestionar_procesos

        avisoPadreOcultarProcesoDetalle(){
            this.$emit('ocultarProcesoDetalle', true);
        },
        avisoPadreFiltroCandidatos(){
            this.$emit('filtrarCandidatos', this.referencia, this.filtroSeleccionado, this.curriculums_ciegos, this.numero_candidatos);
        },

        // Métodos propios

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
        redirigeHaciaTop(){
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: "smooth"
            });
        },
        quitarCurriculum(){
            this.curriculumVisible = false;
            this.muestraElementosProcesoDetalle();
        },
        async obtenerDatosCurriculum(idCandidato){
            try {
                let datosCurriculum = await $.get('http://next-job.lan/build/assets/php/obtener_datos_candidato.php?id_demandante=' + idCandidato + "&referencia=" + this.referencia).fail(() => {
                    this.avisoErrorPeticion();
                });

                let objetoCurriculum = '{"curriculum":[' + datosCurriculum.substring(0, datosCurriculum.length - 1) + "]}";

                if (objetoCurriculum.indexOf("0 resultados") == -1){
                    objetoCurriculum = JSON.parse(objetoCurriculum);
                    console.log(objetoCurriculum["curriculum"]);
                }

                return objetoCurriculum["curriculum"];
            } catch (error) {
                this.avisoErrorPeticion();
                console.error('Se ha producido un error', error);
            }
        },
        eliminaEstudiosOExperienciasDuplicadas(){
            this.nombre_experiencia = this.nombre_experiencia.filter((valor, indice, arrayAFiltrar) => arrayAFiltrar.indexOf(valor) === indice);
            this.empresa_experiencia = this.empresa_experiencia.filter((valor, indice, arrayAFiltrar) => arrayAFiltrar.indexOf(valor) === indice);
            this.fecha_inicio_experiencia = this.fecha_inicio_experiencia.filter((valor, indice, arrayAFiltrar) => arrayAFiltrar.indexOf(valor) === indice);
            this.fecha_fin_experiencia = this.fecha_fin_experiencia.filter((valor, indice, arrayAFiltrar) => arrayAFiltrar.indexOf(valor) === indice);
            this.descripcion_experiencia = this.descripcion_experiencia.filter((valor, indice, arrayAFiltrar) => arrayAFiltrar.indexOf(valor) === indice);

            this.nombre_formacion = this.nombre_formacion.filter((valor, indice, arrayAFiltrar) => arrayAFiltrar.indexOf(valor) === indice);
            this.centro_formacion = this.centro_formacion.filter((valor, indice, arrayAFiltrar) => arrayAFiltrar.indexOf(valor) === indice);
            this.fecha_inicio_formacion = this.fecha_inicio_formacion.filter((valor, indice, arrayAFiltrar) => arrayAFiltrar.indexOf(valor) === indice);
            this.fecha_fin_formacion = this.fecha_fin_formacion.filter((valor, indice, arrayAFiltrar) => arrayAFiltrar.indexOf(valor) === indice);
        },
        almacenaDatosCurriculum(arrayDatos){
            this.id_candidato = arrayDatos[0]["id"];
            this.nombre = arrayDatos[0]["nombre"];
            this.fecha_nacimiento = new Date(arrayDatos[0]["fecha_nacimiento"]).toLocaleDateString("es-ES");
            this.direccion_postal = arrayDatos[0]["direccion_postal"];
            this.telefono = arrayDatos[0]["telefono"];
            this.email = arrayDatos[0]["email"];
            this.nombre_estado = arrayDatos[0]["nombre_estado"];
            this.fecha_ultimo_estado = new Date(arrayDatos[0]["fecha_estado"]).toLocaleDateString("es-ES");

            for (let i = 0; i < arrayDatos.length; i++){
                this.nombre_experiencia.push(arrayDatos[i]["nombre_experiencia"]);
                this.empresa_experiencia.push(arrayDatos[i]["empresa_experiencia"]);
                this.fecha_inicio_experiencia.push(new Date(arrayDatos[i]["fecha_inicio_experiencia"]).toLocaleDateString("es-ES"));
                this.fecha_fin_experiencia.push(new Date(arrayDatos[i]["fecha_fin_experiencia"]).toLocaleDateString("es-ES"));
                this.descripcion_experiencia.push(arrayDatos[i]["descripcion_experiencia"]);

                this.nombre_formacion.push(arrayDatos[i]["nombre_formacion"]);
                this.centro_formacion.push(arrayDatos[i]["centro_formacion"]);
                this.fecha_inicio_formacion.push(new Date(arrayDatos[i]["fecha_inicio_formacion"]).toLocaleDateString("es-ES"));
                this.fecha_fin_formacion.push(new Date(arrayDatos[i]["fecha_fin_formacion"]).toLocaleDateString("es-ES"));
            }

            this.eliminaEstudiosOExperienciasDuplicadas();
        },
        reseteaDatosCurriculum(){
            this.id_candidato = "";
            this.nombre = "";
            this.fecha_nacimiento = "";
            this.direccion_postal = "";
            this.telefono = "";
            this.email = "";
            this.nombre_estado = "";
            this.fecha_ultimo_estado = "";

            this.nombre_experiencia = [];
            this.empresa_experiencia = [];
            this.fecha_inicio_experiencia = [];
            this.fecha_fin_experiencia = [];
            this.descripcion_experiencia = [];

            this.nombre_formacion = [];
            this.centro_formacion = [];
            this.fecha_inicio_formacion = [];
            this.fecha_fin_formacion = [];
        },
        anhadeEstadoCVLeido(idCandidato){
            try{
                let parametrosConsulta = {
                    nombre: "CV Leído",
                    descripcion: "El CV ha sido leído por el personal de selección",
                    id_demandante: idCandidato,
                    id_oferta: this.referencia
                };

                $.post('http://next-job.lan/build/assets/php/anhadir_estado_inscripcion.php', $.param(parametrosConsulta)).done(function (respuesta){
                    console.log(respuesta);
                }).fail(() => {
                    this.avisoErrorPeticion();
                });
            } catch (error){
                console.error("Se ha producido un error", error);
            }

        },
        async imprimirCurriculum(idCandidato){
            try {
                this.reseteaDatosCurriculum();
                let objetoDatosCurriculum = await this.obtenerDatosCurriculum(idCandidato);
                this.almacenaDatosCurriculum(objetoDatosCurriculum);
                this.ocultaElementosProcesoDetalle();
                this.anhadeEstadoCVLeido(idCandidato);
                this.curriculumVisible = true;
                this.redirigeHaciaTop();
            } catch (error){
                this.avisoErrorPeticion();
                console.error('Se ha producido un error', error);
            }
        },
        ocultaElementosProcesoDetalle(){
            $("#container_proceso_detalle").css("display", "none");
        },
        muestraElementosProcesoDetalle(){
            $("#container_proceso_detalle").css("display", "grid");
        },
        avisoPadreRecargaCandidatos(numeroPagina){
            this.$emit('recargarCandidatosProcesoDetalle', numeroPagina, this.referencia, this.curriculums_ciegos)
        },
    }
}
