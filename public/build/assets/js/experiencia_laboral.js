export default {
    props: ['nombre_experiencia', 'empresa_experiencia', 'fecha_inicio_experiencia', 'fecha_fin_experiencia', 'descripcion_experiencia'],
    template: `
    <div class="container_experiencia_curriculum">
        <div class="datos_experiencia_iconos_curriculum">
            <div class="datos_experiencia_curriculum">
                <div class="nombre_trabajo_curriculum">
                    <h3>{{ nombre_experiencia }}</h3>
                </div>
                <div class="nombre_empresa_curriculum">
                    <p>{{ empresa_experiencia }}</p>
                </div>
                <div class="fecha_inicio_fin_experiencia_curriculum">
                    <p>{{ fecha_inicio_experiencia }} - {{ fecha_fin_experiencia }}</p>
                </div>
            </div>
        </div>
        <div class="descripcion_experiencia_curriculum">
            <p>{{ descripcion_experiencia }}</p>
        </div>
    </div>
    `,
}
