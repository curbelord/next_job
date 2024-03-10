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

?>

@extends('layouts.plantilla')

@section('title', 'Ofertas de empleo')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleOfertas.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleFiltros.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleBuscador.css') }}">
@endsection

@section('content')

    <div class="content">

        @include('components.buscador')

        <div class="ofertas">

            @foreach ($ofertas as $oferta)

                <div class="contenedor_ofertas">

                    <div class="oferta">
                        <div class="oferta_img">IMG</div>
                        <div class="oferta_titulo">
                            <h3> {{ $oferta->puesto_trabajo }} </h3>
                        </div>
                        <div class="oferta_empresa">
                            <p> Artek </p>
                        </div>
                        <div>
                            <div class="oferta_localizacion">
                                <p> Ubicación: {{ $oferta->ubicacion }} </p>
                            </div>
                            <div class="oferta__fecha">
                                <p> Fecha: {{ $oferta->fecha_publicacion }} </p>
                            </div>
                        </div>
                        <div class="oferta_descripcion">
                            <p> {{ $oferta->descripcion }} </p>
                        </div>
                        <div>
                            <div class="oferta_jornada">
                                <p> {{ $oferta->jornada }} </p>
                            </div>
                            <div class="oferta_tipo_contrato">
                                <p> {{ $oferta->tipo_trabajo }} </p>
                            </div>
                        </div>
                        <div class="vector_borde_azul"></div>
                    </div>

                </div>

            @endforeach

        </div>

    </div>

@endsection
