@extends('layouts.plantilla')

@section('title', 'Información de proceso')

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
                    <h1>Título oferta</h1>
                </div>
                <div id="nombre_empresa">
                    <p>Nombre empresa</p>
                </div>
                <div id="centro_trabajo">
                    <p>Centro de trabajo</p>
                </div>
            </div>
        </div>

        <div id="container_ultimo_cambio">
            <div id="subcontainer_ultimo_cambio">
                <p>Último cambio</p>
            </div>
        </div>

        <div id="container_cambios">
            @for ($i = 0; $i < 3; $i++)
                @component('components.cambio')
                @endcomponent

                @if(($i + 1) != 3)
                    @component('components.separacion_cambio')
                    @endcomponent
                @endif
            @endfor

            <div id="container_estado_candidatura">
                <div id="titulo_estado_candidatura">
                    <h3>Estado de la candidatura</h3>
                </div>
                <div id="mensaje_estado_candidatura">
                    <p>Mensaje que describa la situación y anime al demandante</p>
                </div>
            </div>
        </div>
    </div>
@endsection
