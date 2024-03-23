<div class="container_candidato">
    <div class="container_left_candidato">
        <div class="imagen_candidato"></div>
        <div class="nombre_edad">
            <div class="nombre">
                <h3>{{ nombre }}</h3>
            </div>
            <div class="edad">
                <p>{{ edad }}</p>
            </div>
        </div>
    </div>
    <div class="container_mid_candidato" {{ estilo_container_candidato }}>
        <div class="curriculum" {{ estilo_curriculum_visible }}>
            <a href="{{ url_curriculum }}">Curriculum</a>
        </div>
    </div>
    <div class="container_right_candidato">
        <div class="imagen_nota_ojo">
            <div class="imagen_nota">
                <a href="{{ url_nota }}"></a>
            </div>
            <div class="imagen_ojo">
                <a href="{{ url_ojo }}"></a>
            </div>
        </div>
    </div>
</div>
