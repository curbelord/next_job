export default {
    props: ['referencia', 'puesto_trabajo', 'ubicacion', 'fecha_creacion', 'numero_candidatos'],
    template: `
    <div class="container_proceso">
        <div class="titulo_proceso">
            <h3>{{ puesto_trabajo }}</h3>
        </div>
        <div class="datos_mid_proceso">
            <div class="datos_mid_left_proceso">
                <div class="centro_trabajo">
                    <p>{{ ubicacion }}</p>
                </div>
                <div class="fecha_publicacion">
                    <p>{{ fecha_creacion }}</p>
                </div>
                <div class="numero_candidatos_oferta">
                    <div class="imagen_numero_candidatos_oferta"></div>
                    <div class="valor_numero_candidatos_oferta">
                        <p>{{ numero_candidatos }}</p>
                    </div>
                </div>
            </div>
            <div class="datos_mid_mid_proceso">
                <div class="estado">
                    <select>
                        <option value="null">Estado</option>
                        <option value="publicada">Publicada</option>
                        <option value="plantilla">Plantilla</option>
                    </select>
                </div>
            </div>
            <div class="datos_mid_right_proceso">
                <div class="hipervinculos">
                    <div class="imagen_datos_mid_right imagen_ojo">
                        <a href="#" @click.prevent="avisoPadreImpresionProceso"></a>
                    </div>
                    <div class="imagen_datos_mid_right imagen_lapiz">
                        <a href="#"></a>
                    </div>
                    <div class="imagen_datos_mid_right imagen_papelera">
                        <a href="#"></a>
                        <form method="POST" action="#" class="formulario_eliminacion">
                            <button type="submit"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `,
    methods: {
        avisoPadreImpresionProceso(){
            this.$emit('abrirProceso', this.referencia);
        },
    },
}
