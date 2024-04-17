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

  $j = 1;
  $i = 2;

  $titulo = 'Busca un empleo';

  $mostrarFiltros = false;
  $mostrarProvincias = true;
  $placeholder_buscador = 'Puesto, localidad, categoría...';

?>

@extends('layouts.plantilla')

@section('title', 'Principal')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleBuscador.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/principal.css') }}">
@endsection

@section('content')

    <div class="content">

        @if(session('mensajeRegistro'))
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                });
                Toast.fire({
                    icon: "success",
                    title: "¡Se ha registrado exitosamente!"
                });
            </script>
        @elseif(session('mensajeLogin'))
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                });
                Toast.fire({
                    icon: "success",
                    title: "¡Se ha iniciado sesión correctamente!"
                });
            </script>
            <?php session()->forget('mensajeLogin'); ?>
        @endif

        @include('components.buscador')

        <div class="bloque"></div>

        <div class="seccion_relleno">
            <div></div>

            <span>Encuentra el trabajo que buscas</span>
        </div>

        <div class="bloque"></div>

        <div class="seccion_valor">
            <span>Encuentra el trabajo que buscas</span>

            <div></div>
        </div>

        <div class="bloque"></div>

        <div class="seccion_provincias">

            <h2>Empleo por provincias</h2>

            <div class="provincia provincia_1-3">
                <div class="imagen_provincia">
                    <form method="GET" action="{{ route('gestionar.ofertas.ofertas') }}">
                        @csrf
                        <input type="submit" class="provincia" name="provincia" value="Las Palmas">
                    </form>
                </div>
                <div class="nombre_provincia">
                    <form method="GET" action="{{ route('gestionar.ofertas.ofertas') }}">
                        @csrf
                        <input type="submit" class="provincia" name="provincia" value="Las Palmas">
                    </form>
                </div>
            </div>

            <div class="provincia provincia_2-3">
                <div class="imagen_provincia">
                    <form method="GET" action="{{ route('gestionar.ofertas.ofertas') }}">
                        @csrf
                        <input type="submit" class="provincia" name="provincia" value="Santa Cruz de Tenerife">
                    </form>
                </div>
                <div class="nombre_provincia">
                    <form method="GET" action="{{ route('gestionar.ofertas.ofertas') }}">
                        @csrf
                        <input type="submit" class="provincia" name="provincia" value="Santa Cruz de Tenerife">
                    </form>
                </div>
            </div>

            <div class="provincia provincia_3-3">
                <div class="imagen_provincia">
                    <form method="GET" action="{{ route('gestionar.ofertas.ofertas') }}">
                        @csrf
                        <input type="submit" class="provincia" name="provincia" value="Madrid">
                    </form>
                </div>
                <div class="nombre_provincia">
                    <form method="GET" action="{{ route('gestionar.ofertas.ofertas') }}">
                        @csrf
                        <input type="submit" class="provincia" name="provincia" value="Madrid">
                    </form>
                </div>
            </div>

        </div>

        <div class="bloque"></div>

    </div>

@endsection
