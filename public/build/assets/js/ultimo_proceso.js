export default {
    props: ['puesto_trabajo', 'ubicacion', 'fecha_publicacion', 'numero_inscritos', 'numero_preseleccionados', 'numero_descartados'],
    template: `
    <div class="container_oferta">
        <div class="datos_top">
            <div class="titulo_oferta">
                <h3>{{ puesto_trabajo }}</h3>
            </div>
            <div class="centro_trabajo_fecha_publicacion">
                <div class="centro_trabajo">
                    <p>{{ ubicacion }}</p>
                </div>
                <div class="fecha_publicacion">
                    <p>{{ fecha_publicacion }}</p>
                </div>
            </div>
        </div>
        <div class="datos_bottom">
            <div class="container_numero_inscritos">
                <div class="subcontainer_numero_inscritos">
                    <div class="imagen_datos_bottom imagen_inscritos"></div>
                    <div class="valor_numero_inscritos">
                        <p>{{ numero_inscritos }} inscritos</p>
                    </div>
                </div>
            </div>

            <div class="container_numero_preseleccionados">
                <div class="subcontainer_numero_preseleccionados">
                    <div class="imagen_datos_bottom imagen_preseleccionados"></div>
                    <div class="valor_numero_preseleccionados">
                        <p>{{ numero_preseleccionados }} preseleccionados</p>
                    </div>
                </div>
            </div>

            <div class="container_numero_descartados">
                <div class="subcontainer_numero_descartados">
                    <div class="imagen_datos_bottom imagen_descartados"></div>
                    <div class="valor_numero_descartados">
                        <p>{{ numero_descartados }} descartados</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `,
}
