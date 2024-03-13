@extends('layouts.plantilla')

@section('title', 'Gestionar procesos')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleGestionarOfertas.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleComponenteProceso.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleNumeracionSlider.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_datos_top">
            <div id="titulo_gestion_procesos">
                <h3>Gestión de procesos</h3>
            </div>
            <div id="datos_candidatos">
                <div id="numero_procesos">
                    <div class="imagen_datos_candidatos"></div>
                    <div id="valor_numero_procesos">
                        <p>Nº procesos</p>
                    </div>
                </div>
                <div id="numero_candidatos">
                    <div class="imagen_datos_candidatos"></div>
                    <div id="valor_numero_candidatos">
                        <p>Nº candidatos</p>
                    </div>
                </div>
                <div id="numero_preseleccionados">
                    <div class="imagen_datos_candidatos"></div>
                    <div id="valor_numero_preseleccionados">
                        <p>Nº preseleccionados</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="container_procesos">
            <div id="subcontainer_procesos">
                @forelse ($ofertas as $oferta)
                    @component('components.proceso')
                        @slot('puesto_trabajo')
                            {{ $oferta->puesto_trabajo }}
                        @endslot

                        @slot('ubicacion')
                            {{ $oferta->ubicacion }}
                        @endslot

                        @slot('created_at')
                            {{ date('d/m/Y', strtotime($oferta->created_at)) }}
                        @endslot

                        @slot('numero_candidatos')
                            {{ count($inscripciones) }}
                        @endslot
                    @endcomponent
                @empty

                @endforelse
            </div>
        </div>

        <?php
            $numeroSliderNumeracion = 2;
        ?>

        <div id="container_slider_numeracion">
            @for ($i = 0; $i < count($ofertas); $i++)
                @if ($i > 0 && $i % 20 == 0)
                    @component('components.numeracion_slider')
                        @slot('numero')
                            {{ $numeroSliderNumeracion }}
                        @endslot
                        {{ $numeroSliderNumeracion++ }}
                    @endcomponent
                @endif
            @endfor
        </div>
    </div>
@endsection
