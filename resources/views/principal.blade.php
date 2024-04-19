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

        <div id="container_elementos_principal">
            <div id="seccion_destaque_1" class="seccion_destaque">
                <div id="imagen_seccion_destaque_1" class="imagen_seccion_destaque"></div>
                <div class="texto_seccion_destaque">
                    <h3 class="titulo_seccion_destaque">Lorem ipsum dolor. Sit amet.</h3>
                    <p class="parrafo_seccion_destaque">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tincidunt, magna eget dictum efficitur, diam tellus lobortis diam, ut sagittis erat sapien sit amet felis. Praesent pharetra, nulla mattis rhoncus fringilla</p>
                </div>
            </div>

            <div id="seccion_destaque_2" class="seccion_destaque">
                <div class="texto_seccion_destaque">
                    <h3 class="titulo_seccion_destaque">Lorem ipsum dolor. Sit amet.</h3>
                    <p class="parrafo_seccion_destaque">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tincidunt, magna eget dictum efficitur, diam tellus lobortis diam, ut sagittis erat sapien sit amet felis. Praesent pharetra, nulla mattis rhoncus fringilla</p>
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
