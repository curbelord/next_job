@extends('layouts.plantilla')

@section('title', 'Estados candidatura')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleProcessInfo.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCambio.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleSeparacionCambio.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_datos_proceso">
            <div id="container_imagen">
                <div id="imagen_empresa"></div>
            </div>
            <div id="container_texto_datos">
                <div id="titulo_oferta">
                    <h1>{{ $oferta->puesto_trabajo }}</h1>
                </div>
                <div id="nombre_empresa">
                    <p>{{ $empresa->nombre }}</p>
                </div>
                <div id="centro_trabajo">
                    <p>{{ $oferta->ubicacion }}</p>
                </div>
            </div>
        </div>

        <div id="container_ultimo_cambio">
            <div id="subcontainer_ultimo_cambio">
                @if($oferta->fecha_cierre == date("Y-m-d"))
                    <p>El proceso selectivo ha vencido <br> <span>{{ date('d/m/Y', strtotime($oferta->fecha_cierre)) }}</span></p>
                @else
                    <p>{{ $ultimoEstado->nombre }} <br> <span>{{ date('d/m/Y', strtotime($ultimoEstado->created_at)) }}</span></p>
                @endif
            </div>
        </div>

        <div id="container_cambios">
            @foreach ($estados as $key => $estado)
                @component('components.cambio')
                    @switch($estado->nombre)
                        @case("Inscrito")
                            @slot('nombreImagen')
                                {{ "inscrito" }}
                            @endslot
                            @break
                        @case("CV leído")
                            @slot('nombreImagen')
                                {{ "cv_leido" }}
                            @endslot
                            @break
                        @case("Preseleccionado")
                            @slot('nombreImagen')
                                {{ "preseleccionado" }}
                            @endslot
                            @break
                        @case("Seleccionado para entrevista")
                            @slot('nombreImagen')
                                {{ "seleccionador_entrevista" }}
                            @endslot
                            @break
                        @case("Entrevista positiva")
                            @slot('nombreImagen')
                                {{ "entrevista_negativa" }}
                            @endslot
                            @break
                        @case("Entrevista negativa")
                            @slot('nombreImagen')
                                {{ "entrevista_positiva" }}
                            @endslot
                            @break
                        @case("Descartado")
                            @slot('nombreImagen')
                                {{ "descartado" }}
                            @endslot
                            @break
                        @default

                    @endswitch
                    @slot('nombreEstado')
                        {{ $estado->nombre }}
                    @endslot

                    @slot('fechaEstado')
                        {{ date('d/m/Y', strtotime($estado->created_at)) }}
                    @endslot
                @endcomponent

                @if($key < $estados->count() - 1)
                    @component('components.separacion_cambio')
                    @endcomponent
                @endif
            @endforeach
        </div>
    </div>
@endsection
