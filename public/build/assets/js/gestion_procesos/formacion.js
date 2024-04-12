export default {
    props: ['nombre_formacion', 'centro_formacion', 'fecha_inicio_formacion', 'fecha_fin_formacion'],
    template: `
    <div class="container_formacion_curriculum">
        <div class="datos_formacion_iconos_curriculum" v-if="nombre_formacion != ''">
            <div class="datos_formacion_curriculum">
                <div class="nombre_formacion_curriculum">
                    <h3>{{ nombre_formacion }}</h3>
                </div>
                <div class="nombre_centro_curriculum">
                    <p>{{ centro_formacion }}</p>
                </div>
                <div class="fecha_inicio_fin_formacion_curriculum">
                    <p>{{ fecha_inicio_formacion }} - {{ fecha_fin_formacion }}</p>
                </div>
            </div>
        </div>
        <div class="datos_formacion_iconos_curriculum" v-else>
            <h3>No hay estudios registrados</h3>
        </div>
    </div>
    `,
}
