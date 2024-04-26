<?php
    $offset = 0;
    $noHayCandidaturas = false;
?>

@extends('layouts.plantilla')

@section('title', 'Mis candidaturas')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCandidaturas.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleNumeracionSlider.css') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div id="container">
        <form method="GET" action="{{ route('candidaturas', $offset) }}">
            <div class="container_boton_volver">
                <a href="{{ route('principal') }}">Volver</a>
            </div>

            <div id="container_titulo">
                <div id="titulo_candidaturas">
                    <h1>Candidaturas</h1>
                </div>
            </div>

            <div id="container_candidaturas">
                @forelse ($candidaturas as $clave => $candidatura)
                    @component('components.candidatura')
                        @slot('idCandidatura')
                            {{ $candidaturas[$clave]->referencia }}
                        @endslot

                        @slot('nombreCandidatura')
                            {{ $candidaturas[$clave]->puesto_trabajo }}
                        @endslot

                        @slot('nombreEmpresa')
                            {{ $candidaturas[$clave]->nombre_empresa }}
                        @endslot

                        @slot('ultimoEstado')
                            {{ $candidaturas[$clave]->nombre_estado }}
                        @endslot

                        @slot('visto')
                            {{ $candidaturas[$clave]->visto }}
                        @endslot
                    @endcomponent
                @empty
                    <div id="container_sin_candidaturas">
                        <h3>No hay candidaturas</h3>
                    </div>

                    @php
                        $noHayCandidaturas = true;
                    @endphp
                @endforelse
            </div>

            <div id="container_numeracion_slider">
                @if($cantidadTotalCandidaturas > 10)
                    @php
                        $numIteraciones = ceil($cantidadTotalCandidaturas / 10);
                    @endphp

                    @for($i = 0; $i < $numIteraciones; $i++)
                        @if($cantidadTotalCandidaturas > 0 && $cantidadTotalCandidaturas < 10)
                            @php
                                $cantidadTotalCandidaturas = 10;
                            @endphp
                        @endif
                        @component('components.numeracion_slider')
                            @slot('numero_pagina')
                                {{ $i + 1 }}
                            @endslot
                            {{ $cantidadTotalCandidaturas -= 10 }}
                        @endcomponent
                    @endfor
                @endif
            </div>
        </form>
    </div>

    <script src="{{ asset('build/assets/js/js_vistas/empresas.js') }}"></script>
@endsection
