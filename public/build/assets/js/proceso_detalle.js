import curriculum_simplificado from "./curriculum_simplificado.js";
import curriculum from "./curriculum.js";

export default {
    data(){
        return {
            numeroOffset: 0,
            numeroLimiteCandidatos: 20,
            estadoCurriculum: false,

            // Datos componente "curriculum"

            nombre: "",
            fecha_nacimiento: "",
            direccion_postal: "",
            telefono: "",
            email: "",
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
    props: ['referencia', 'puesto_trabajo', 'numero_candidatos', 'candidatos_preseleccionados_proceso', 'candidatos_descartados_proceso', 'estilo_container_candidato', 'estilo_curriculum_visible', 'url_curriculum', 'url_nota', 'url_ojo', 'nombre_o_id_candidatos', 'edad_o_experiencia_candidatos', 'fecha_publicacion_proceso', 'salario_proceso', 'jornada_proceso', 'turno_proceso', 'id_candidatos', 'descripcion_oferta'],
    components: {
        curriculum_simplificado,
        curriculum,
    },
    template: `
    <div id="container_proceso_detalle">
        <div id="container_datos_top_proceso_detalle">
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
            </div>
            <div id="container_info_candidatos">
                <div id="subcontainer_info_candidatos">

                    <curriculum_simplificado @impresionCurriculum="imprimirCurriculum" v-for="i in numero_candidatos" :key="i" :i="i" :id_oferta="referencia" :id_candidato="id_candidatos[i - 1]" :estilo_container_candidato="estilo_container_candidato" :estilo_curriculum_visible="estilo_curriculum_visible" :url_curriculum="url_curriculum" :url_nota="url_nota" :url_ojo="url_ojo" :nombre_o_id_candidatos="nombre_o_id_candidatos" :edad_o_experiencia_candidatos="edad_o_experiencia_candidatos"></curriculum_simplificado>

                </div>
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

    <curriculum v-if="estadoCurriculum" :nombre="nombre" :fecha_nacimiento="fecha_nacimiento" :direccion_postal="direccion_postal" :telefono="telefono" :email="email" :nombre_experiencia="nombre_experiencia" :empresa_experiencia="empresa_experiencia" :fecha_inicio_experiencia="fecha_inicio_experiencia" :fecha_fin_experiencia="fecha_fin_experiencia" :descripcion_experiencia="descripcion_experiencia" :nombre_formacion="nombre_formacion" :centro_formacion="centro_formacion" :fecha_inicio_formacion="fecha_inicio_formacion" :fecha_fin_formacion="fecha_fin_formacion"></curriculum>
    `,
    methods: {
        async obtenerDatosCurriculum(idCandidato){
            try {
                let datosCurriculum = await $.get('http://next-job.lan/build/assets/php/obtener_perfil.php?id_demandante=' + idCandidato);
                let datosExperiencias = await $.get('http://next-job.lan/build/assets/php/obtener_experiencia.php?id_demandante=' + idCandidato);
                let datosEstudios = await $.get('http://next-job.lan/build/assets/php/obtener_formacion.php?id_demandante=' + idCandidato);

                let objetoCurriculum = '{"curriculum":[' + datosCurriculum.substring(0, datosCurriculum.length - 1) + "]}";
                objetoCurriculum = JSON.parse(objetoCurriculum);
                let objetoExperiencias = '{"experiencias":[' + datosExperiencias.substring(0, datosExperiencias.length - 1) + "]}";
                objetoExperiencias = JSON.parse(objetoExperiencias);
                let objetoEstudios = '{"estudios":[' + datosEstudios.substring(0, datosEstudios.length - 1) + "]}";
                objetoEstudios = JSON.parse(objetoEstudios);

                console.log(objetoExperiencias["experiencias"]);

                return [objetoCurriculum["curriculum"], objetoExperiencias["experiencias"], objetoEstudios["estudios"]];
            } catch (error) {
                console.error('Error al hacer la petición', error);
            }
        },
        almacenaDatosCurriculum(arrayDatos){
            this.nombre = arrayDatos[0][0]["nombre"];
            this.fecha_nacimiento = new Date(arrayDatos[0][0]["fecha_nacimiento"]).toLocaleDateString("es-ES");
            this.direccion_postal = arrayDatos[0][0]["direccion_postal"];
            this.telefono = arrayDatos[0][0]["telefono"];
            this.email = arrayDatos[0][0]["email"];

            for (let i = 0; i < arrayDatos[1].length; i++){
                this.nombre_experiencia.push(arrayDatos[1][i]["nombre_experiencia"]);
                this.empresa_experiencia.push(arrayDatos[1][i]["empresa_experiencia"]);
                this.fecha_inicio_experiencia.push(new Date(arrayDatos[1][i]["fecha_inicio_experiencia"]).toLocaleDateString("es-ES"));
                this.fecha_fin_experiencia.push(new Date(arrayDatos[1][i]["fecha_fin_experiencia"]).toLocaleDateString("es-ES"));
                this.descripcion_experiencia.push(arrayDatos[1][i]["descripcion_experiencia"]);
            }

            for (let i = 0; i < arrayDatos[2].length; i++){
                this.nombre_formacion.push(arrayDatos[2][i]["nombre_formacion"]);
                this.centro_formacion.push(arrayDatos[2][i]["centro_formacion"]);
                this.fecha_inicio_formacion.push(new Date(arrayDatos[2][i]["fecha_inicio_formacion"]).toLocaleDateString("es-ES"));
                this.fecha_fin_formacion.push(new Date(arrayDatos[2][i]["fecha_fin_formacion"]).toLocaleDateString("es-ES"));
            }
        },
        async imprimirCurriculum(idCandidato){
            try {
                let objetoDatosCurriculum = await this.obtenerDatosCurriculum(idCandidato);
                this.almacenaDatosCurriculum(objetoDatosCurriculum);
                this.ocultaElementosProcesoDetalle();
                this.estadoCurriculum = true;
            } catch (error){
                console.error('Error al hacer la petición', error);
            }
        },
        ocultaElementosProcesoDetalle(){
            $("#container_proceso_detalle").css("display", "none");
        },
    }
}
