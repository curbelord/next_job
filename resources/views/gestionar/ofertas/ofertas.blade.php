<?php
  $provincias = [
    'Álava',
    'Albacete',
    'Alicante',
    'Almería',
    'Ávila',
    'Badajoz',
    'Baleares',
    'Barcelona',
    'Burgos',
    'Cáceres',
    'Cádiz',
    'Castellón',
    'Ciudad Real',
    'Córdoba',
    'Cuenca',
    'Gerona',
    'Granada',
    'Guadalajara',
    'Guipúzcoa',
    'Huelva',
    'Huesca',
    'Jaén',
    'La Coruña',
    'La Rioja',
    'Las Palmas',
    'León',
    'Lérida',
    'Lugo',
    'Madrid',
    'Málaga',
    'Murcia',
    'Navarra',
    'Orense',
    'Palencia',
    'Pontevedra',
    'Salamanca',
    'Santa Cruz de Tenerife',
    'Segovia',
    'Sevilla',
    'Soria',
    'Tarragona',
    'Teruel',
    'Toledo',
    'Valencia',
    'Valladolid',
    'Vizcaya',
    'Zamora',
    'Zaragoza',
    'Ceuta',
    'Melilla'
  ];

  $titulo = '¡Aplica filtros para cerrar la búsqueda!';
  $mostrarFiltros = true;
  $mostrarProvincias = true;
  $placeholder_buscador = 'Puesto, localidad, categoría...';
  $offset = 0;
  $noHayOfertas = false;

?>

@extends('layouts.plantilla')

@section('title', 'Ofertas de empleo')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleOfertas.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleFiltros.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleBuscador.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleNumeracionSlider.css') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="content">

        <div class="seccion_buscador">
            <form method="GET" action="{{ route('gestionar.ofertas.ofertas', $offset) }}">
                @csrf

                <div class="tabla">
                    <h2>{{ $titulo }}</h2>
                </div>

                <div class="tabla">
                    <input type="text" name="buscador" id="buscador" placeholder="{{ $placeholder_buscador }}" value="{{ $buscador }}">

                    @if ($mostrarProvincias)
                        <select name="provincia" id="provincia">
                            <option value="0">Selecciona una provincia</option>

                                @foreach ($provincias as $provincia)
                                    @if($ubicacion != "" && $ubicacion == $provincia)
                                        <option value="{{ $provincia }}" selected>{{ $provincia }}</option>
                                    @else
                                        <option value="{{ $provincia }}">{{ $provincia }}</option>
                                    @endif
                                @endforeach
                        </select>
                    @endif
                </div>

                <div class="tabla tabla_filtros">
                    @if ($mostrarFiltros)
                        @include('components.filtros')
                    @endif
                </div>

                <div class="tabla">
                    <button type="submit">Buscar</button>
                </div>


                <div class="ofertas">
                    <div class="contenedor_ofertas">
                        @forelse ($ofertas as $oferta)
                            @component('components.oferta')
                                @slot('provincia')
                                    {{ $oferta->provincia }}
                                @endslot

                                @slot('referencia')
                                    {{ $oferta->referencia }}
                                @endslot

                                @slot('puesto_trabajo')
                                    {{ $oferta->puesto_trabajo }}
                                @endslot

                                @slot('nombre_empresa')
                                    {{ $oferta->seleccionador->empresa->nombre }}
                                @endslot

                                @slot('ubicacion')
                                    {{ $oferta->ubicacion }}
                                @endslot

                                @slot('jornada')
                                    {{ $oferta->jornada }}
                                @endslot

                                @slot('tipo_trabajo')
                                    {{ $oferta->tipo_trabajo }}
                                @endslot

                                @slot('descripcion')
                                    {{ $oferta->descripcion }}
                                @endslot
                            @endcomponent
                        @empty
                            <div id="container_sin_ofertas">
                                <div id="titulo_sin_ofertas">
                                    <h3>No hay ofertas registradas</h3>
                                </div>
                            </div>

                            @php
                                $noHayOfertas = true;
                            @endphp
                        @endforelse
                    </div>
                </div>
                <div id="container_numeracion_slider">
                    @if($noHayOfertas == false)
                        @php
                            $numIteraciones = ceil($cantidadTotalOfertas / 10);
                        @endphp

                        @for($i = 0; $i < $numIteraciones; $i++)
                            @if($cantidadTotalOfertas > 0 && $cantidadTotalOfertas < 10)
                                @php
                                    $cantidadTotalOfertas = 10;
                                @endphp
                            @endif
                            @component('components.numeracion_slider')
                                @slot('numero_pagina')
                                    {{ $i + 1 }}
                                @endslot
                                {{ $cantidadTotalOfertas -= 10 }}
                            @endcomponent
                        @endfor
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('build/assets/js/js_vistas/ofertas.js') }}"></script>
@endsection
