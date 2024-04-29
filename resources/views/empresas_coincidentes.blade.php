<?php
    $offset = 0;
    $noHayOfertas = false;
?>

@extends('layouts.plantilla')

@if($filtro != "")
    @section('title', 'Empresas encontradas por "' . $filtro . '"')
@else
    @section('title', 'Empresas registradas')
@endif

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleComponenteEmpresa.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleNumeracionSlider.css') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div id="container">
        <form method="GET" action="{{ route('empresas_coincidentes', $offset) }}">
            <div class="container_boton_volver">
                <a onclick="goBack(); return false;">Volver</a>
            </div>
            <div id="container_titulo">
                <div id="titulo_empresas_coincidentes">
                    @if($filtro != "")
                        <h1>Empresas coincidentes con "{{ $filtro }}"</h1>
                    @else
                        <h1>Empresas registradas en Next Job</h1>
                    @endif
                </div>
            </div>

            <div id="container_empresas_coincidentes">
                @if(isset($mensajeIdInvalida))
                    <div id="container_sin_empresas">
                        <h3>{{ $mensajeIdInvalida }}</h3>
                    </div>
                @else
                    @forelse ($empresas as $empresa)
                        @component('components.empresa')
                            @slot('id')
                                {{ $empresa->id }}
                            @endslot

                            @slot('nombre')
                                {{ $empresa->nombre }}
                            @endslot

                            @slot('ubicacion')
                                {{ $empresa->ubicacion }}
                            @endslot
                        @endcomponent
                    @empty
                        <div id="container_sin_empresas">
                            <h3>No hay ninguna empresa registrada que coincida con "{{ $filtro }}"</h3>
                        </div>

                        @php
                            $noHayOfertas = true;
                        @endphp
                    @endforelse
                @endif
            </div>

            <div id="container_numeracion_slider">
                @if($cantidadTotalEmpresas > 10)
                    @php
                        $numIteraciones = ceil($cantidadTotalEmpresas / 10);
                    @endphp

                    @for($i = 0; $i < $numIteraciones; $i++)
                        @if($cantidadTotalEmpresas > 0 && $cantidadTotalEmpresas < 10)
                            @php
                                $cantidadTotalEmpresas = 10;
                            @endphp
                        @endif
                        @component('components.numeracion_slider')
                            @slot('numero_pagina')
                                {{ $i + 1 }}
                            @endslot
                            {{ $cantidadTotalEmpresas -= 10 }}
                        @endcomponent
                    @endfor
                @endif
            </div>
        </form>
    </div>

    <script src="{{ asset('build/assets/js/js_vistas/empresas.js') }}"></script>
    <script src="{{ asset('build/assets/js/js_vistas/redireccion_hacia_atras.js') }}"></script>
@endsection
