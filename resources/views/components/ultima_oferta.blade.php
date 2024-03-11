<div class="container_oferta">
    <div class="titulo_oferta">
        <h3>{{ $oferta->puesto_trabajo }}</h3>
    </div>
    <div class="container_centro_trabajo_fecha_publicacion">
        <div class="centro_trabajo_oferta">
            <p>{{ $oferta->ubicacion }}</p>
        </div>
        <div class="fecha_publicacion_oferta">
            <p>{{ $oferta->fecha_publicacion }}</p>
        </div>
    </div>
    <div class="descripcion_oferta">
        <p> {{ $oferta->descripcion }} </p>
    </div>
    <div class="boton_ver_oferta">
        <a href="{{ url('descripcion', ['parametro' => $oferta->referencia]) }}">Ver oferta</a>
    </div>
</div>
