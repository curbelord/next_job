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

            <div class="contenedor_ofertas">

                @foreach ($ofertas as $oferta)

                    <option value="{{ $oferta->provincia }}"></option>

                    <a href="{{ url('descripcion', ['parametro' => $oferta->referencia]) }}" class="oferta">

                        <div class="oferta_img"></div>
                        <div class="oferta_titulo">
                            <h3> {{ $oferta->puesto_trabajo }} </h3>
                        </div>

                        <div class="oferta_info">
                            <div class="oferta_empresa">
                                <span> {{ $oferta->seleccionador->empresa->nombre }} </span>
                            </div>
                            <div class="oferta_localizacion">
                                <span> {{ $oferta->ubicacion }} </span>
                            </div>
                            <div class="oferta_jornada">
                                <span> {{ $oferta->jornada }} </span>
                            </div>
                            <div class="oferta_tipo_contrato">
                                <span> {{ $oferta->tipo_trabajo }} </span>
                            </div>
                        </div>
                        <div class="oferta_descripcion">
                            <span> {{ $oferta->descripcion }} </span>
                        </div>

                    </a>

                @endforeach

            </div>

        </div>

    </div>

@endsection
