<option value="{{ $provincia }}"></option>

<a href="{{ url('descripcion', ['parametro' => $referencia]) }}" class="oferta">

    <div class="oferta_img"></div>
    <div class="oferta_titulo">
        <h3> {{ $puesto_trabajo }} </h3>
    </div>

    <div class="oferta_info">
        <div class="oferta_empresa">
            <span> {{ $nombre_empresa }} </span>
        </div>
        <div class="oferta_localizacion">
            <span> {{ $ubicacion }} </span>
        </div>
        <div class="oferta_jornada">
            <span> {{ $jornada }} </span>
        </div>
        <div class="oferta_tipo_contrato">
            <span> {{ $tipo_trabajo }} </span>
        </div>
    </div>
    <div class="oferta_descripcion">
        <span> {{ $descripcion }} </span>
    </div>

</a>
