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

        @if(session('mensajeVincularEmpresa'))
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                });
                Toast.fire({
                    icon: "success",
                    title: "¡Se ha vinculado a su empresa exitosamente!"
                });
            </script>
        @elseif(session('mensajeEmpresaNoVinculada'))
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                });
                Toast.fire({
                    icon: "error",
                    title: "No se ha podido vincular a su empresa."
                });
            </script>
        @endif

        @include('components.buscador')

        <div id="container_elementos_principal">
            <div id="seccion_destaque_1" class="seccion_destaque">
                <div id="imagen_seccion_destaque_1" class="imagen_seccion_destaque"></div>
                <div class="texto_seccion_destaque">
                    <h3 class="titulo_seccion_destaque">Busca. Encuentra. Rápido.</h3>
                    <p class="parrafo_seccion_destaque">Next Job es una plataforma que permite simplificar la búsqueda de empleo para que sea un proceso fácil y rápido.<br><br>Para ello se pone a disposición de los usuarios una amplia variedad de filtros con los que las búsquedas se delimitan para encontrar lo que realmente estás buscando.</p>
                </div>
            </div>

            <div id="seccion_destaque_2" class="seccion_destaque">
                <div class="texto_seccion_destaque">
                    <h3 class="titulo_seccion_destaque">Un sistema basado en la igualdad.</h3>
                    <p class="parrafo_seccion_destaque">Next Job ofrece una opción para las empresas denominada “currículums ciegos”, la cual permite la visualización de los CV’s sin revelar información personal.<br><br>De esta manera la selección de personal se realiza de una manera justa y libre de prejuicios.</p>
                </div>
                <div id="imagen_seccion_destaque_2" class="imagen_seccion_destaque"></div>
            </div>

            <div id="seccion_provincias">
                <h3 id="titulo_seccion_provincias">Empleo por provincias</h3>

                <div id="container_provincias">
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

                    <div class="provincia provincia_3-3">
                        <div class="imagen_provincia">
                            <form method="GET" action="{{ route('gestionar.ofertas.ofertas') }}">
                                @csrf
                                <input type="submit" class="provincia" name="provincia" value="La Coruña">
                            </form>
                        </div>
                        <div class="nombre_provincia">
                            <form method="GET" action="{{ route('gestionar.ofertas.ofertas') }}">
                                @csrf
                                <input type="submit" class="provincia" name="provincia" value="La Coruña">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
