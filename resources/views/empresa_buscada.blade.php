@extends('layouts.plantilla')

@section('title', 'Empresa buscada')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleEmpresaBuscada.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_datos_empresa">
            <div class="container_boton_volver">
                <a onclick="goBack(); return false;">Volver</a>
            </div>
            <div id="container_imagen">
                <div id="imagen_empresa"></div>
            </div>
            <div id="container_texto_datos">
                <div id="nombre_empresa">
                    <h1>{{ $empresa->nombre }}</h1>
                </div>
                <div id="sede_empresa">
                    <p>{{ $empresa->ubicacion}}</p>
                </div>
            </div>
        </div>

        <div id="container_descripcion_empresa">
            <div id="descripcion_empresa">
                <p> {{ $empresa->descripcion }}</p>
            </div>
        </div>

        <div id="container_ultimas_ofertas">
            <div id="titulo_ultimas_ofertas">
                <h3>Últimas ofertas</h3>
            </div>
            <div id="subcontainer_ultimas_ofertas">

                @forelse ($empresa->ofertas as $oferta)
                    @component('components.ultima_oferta', ['oferta' => $oferta])
                    @endcomponent
                @empty
                    <div id="container_sin_ofertas">
                        <h3>No hay ofertas registradas</h3>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

    <script src="{{ asset('build/assets/js/js_vistas/redireccion_hacia_atras.js') }}"></script>
@endsection
