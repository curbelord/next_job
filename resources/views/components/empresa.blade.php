<div class="container_empresa">
    <div class="container_enlace_empresa">
        <a href="{{ route('empresa_buscada', $id) }}"></a>
    </div>
    <div class="subcontainer_empresa">
        <div class="left_container_empresa">
            <div class="imagen_logo_empresa"></div>
        </div>
        <div class="right_container_empresa">
            <h3 class="nombre_empresa">{{ $nombre }}</h3>
            <p class="ubicacion_empresa">{{ $ubicacion }}</p>
        </div>
    </div>
</div>
