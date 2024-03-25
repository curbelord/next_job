import curriculum_simplificado from "./curriculum_simplificado.js";

export default {
    data(){
        return {

        }
    },
    props: ['referencia', 'puesto_trabajo', 'numero_candidatos', 'candidatos_preseleccionados_proceso', 'candidatos_descartados_proceso', 'estilo_container_candidato', 'estilo_curriculum_visible', 'url_curriculum', 'url_nota', 'url_ojo', 'nombre_o_id_candidato', 'edad_o_experiencia_candidato'],
    components: {
        curriculum_simplificado
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

                    <curriculum_simplificado v-for="i in numero_candidatos" :key="i" :estilo_container_candidato="estilo_container_candidato" :estilo_curriculum_visible="estilo_curriculum_visible" :url_curriculum="url_curriculum" :url_nota="url_nota" :url_ojo="url_ojo" :nombre_o_id_candidato="nombre_o_id_candidato" :edad_o_experiencia_candidato="edad_o_experiencia_candidato"></curriculum_simplificado>

                </div>
            </div>
        </div>

        <div id="container_descripcion">
            <div id="titulo_descripcion">
                <h3>Descripción del proceso</h3>
            </div>
            <div id="container_info_descripcion">
                <div id="subcontainer_info_descripcion">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat saepe, iure dolorum, ut corporis velit maiores, minus ex nihil repudiandae nemo libero quasi optio mollitia aperiam sunt? Iste, molestias voluptate.Adipisci incidunt aliquam deleniti maxime aspernatur voluptates corrupti nulla perspiciatis explicabo dolor fugiat perferendis, omnis nihil quisquam facilis, accusantium sunt tempora maiores minima assumenda! Quaerat ipsum at consequatur odio libero.</p>
                </div>
            </div>

            <div id="container_datos_bottom">
                <div id="datos_bottom_fila_1">
                    <div id="fecha_publicacion" class="boton_outline_azul">
                        <p><!-- Fecha publicacion --></p>
                    </div>
                    <div id="salario" class="boton_outline_azul">
                        <p><!-- salario --></p>
                    </div>
                </div>
                <div id="datos_bottom_fila_2">
                    <div id="jornada" class="boton_outline_azul">
                        <p><!-- jornada --></p>
                    </div>
                    <div id="horario" class="boton_outline_azul">
                        <p><!-- turno --></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `
}
