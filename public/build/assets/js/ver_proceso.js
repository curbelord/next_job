export default {
    props: [],
    template: `
    <div id="container">
        <div id="container_datos_top">
            <div id="titulo_datos_procesos">
                <h3>#IDProceso NombreProceso</h3>
            </div>
            <div id="datos_candidatos">
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
                <div id="numero_descartados">
                    <div class="imagen_datos_candidatos"></div>
                    <div id="valor_numero_descartados">
                        <p>Nº descartados</p>
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
                    <!-- HACER BUCLE AQUÍ -->
                    <curriculum_simplificado :estilo_container_candidato="estilo_container_candidato" :estilo_curriculum_visible="estilo_curriculum_visible" :url_curriculum="url_curriculum" :url_nota="url_nota" :url_ojo="url_ojo"></curriculum_simplificado>

                    <!--

                    Si es un currículum ciego, entonces pasar esas variables con estos estilos. Si no, vacías

                    @slot('estilo_container_candidato')
                        {{ "style=padding:0px;" }}
                    @endslot

                    @slot('estilo_curriculum_visible')
                        {{ "style=display:none;" }}
                    @endslot

                    -->
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
                        <p>{{ date('d/m/Y', strtotime($oferta->created_at)) }}</p>
                    </div>
                    <div id="salario" class="boton_outline_azul">
                        <p>{{ $oferta->salario }}</p>
                    </div>
                </div>
                <div id="datos_bottom_fila_2">
                    <div id="jornada" class="boton_outline_azul">
                        <p>{{ $oferta->jornada }}</p>
                    </div>
                    <div id="horario" class="boton_outline_azul">
                        <p>{{ $oferta->turno }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `
}
