<div class="container_candidatura">
    <div class="container_enlace_candidatura">
        <a href="{{ route('candidatura', $idCandidatura) }}"></a>
    </div>
    <div class="subcontainer_candidatura">
        <div class="left_container_candidatura">
            <div class="imagen_logo_empresa"></div>
        </div>
        <div class="right_container_empresa">
            <h3 class="nombre_candidatura">{{ $nombreCandidatura }}</h3>
            <p class="nombre_empresa">{{ $nombreEmpresa }}</p>
            <p class="ultimo_estado">{{ $ultimoEstado }}</p>
        </div>
    </div>
</div>
