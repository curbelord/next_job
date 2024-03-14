<div class="container_candidato">
    <div class="container_left_candidato">
        <div class="imagen_candidato"></div>
        <div class="nombre_edad">
            <div class="nombre">
                <h3>{{ $nombre }}</h3>
            </div>
            <div class="edad">
                <p>{{ $edad }}</p>
            </div>
        </div>
    </div>
    <div class="container_mid_candidato">
        <div class="curriculum">
            <a href="{{ $urlCurriculum }}">Curriculum</a>
        </div>
    </div>
    <div class="container_right_candidato">
        <div class="imagen_nota_ojo">
            <div class="imagen_nota">
                <a href="{{ $urlNota }}"></a>
            </div>
            <div class="imagen_ojo">
                <a href="{{ $urlOjo }}"></a>
            </div>
        </div>
    </div>
</div>
