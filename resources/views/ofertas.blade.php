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

                <div class="oferta">
                    <div class="oferta_img">IMG</div>
                    <div class="oferta_titulo">
                        <h3>Desarrollador Web</h3>
                    </div>
                    <div class="oferta_empresa">
                        <p>Artek</p>
                    </div>
                    <div>
                        <div class="oferta_localizacion">
                            <p>Ubicación: Arrecife</p>
                        </div>
                        <div class="oferta__fecha">
                            <p>Fecha: 03/04/2024</p>
                        </div>
                    </div>
                    <div class="oferta_descripcion">
                        <p>Se busca programador de Backend con experiencia en Laravel y al menos 5 años de PHP.</p>
                    </div>
                    <div>
                        <div class="oferta_jornada">
                            <p>Jornada Completa</p>
                        </div>
                        <div class="oferta_tipo_contrato">
                            <p>Contrato Indefinido</p>
                        </div>
                    </div>
                    <div class="vector_borde_azul"></div>
                </div>

            </div>

        </div>

        <!--div class="content__title">
            <h1>Ofertas</h1>
        </div>

        <div class="content__ofertas">
            <div class="content__ofertas__container">
                <div class="content__ofertas__container__title">
                    <h2>Ofertas de empleo</h2>
                </div>
                <div class="content__ofertas__container__ofertas">
                    <div class="content__ofertas__container__ofertas__oferta">
                        <div class="content__ofertas__container__ofertas__oferta__title">
                            <h3>Oferta de empleo 1</h3>
                        </div>
                        <div class="content__ofertas__container__ofertas__oferta__description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris.</p>
                        </div>
                        <div class="content__ofertas__container__ofertas__oferta__location">
                            <p>Ubicación: Madrid</p>
                        </div>
                        <div class="content__ofertas__container__ofertas__oferta__date">
                            <p>Fecha: 01/01/2022</p>
                        </div>
                    </div>
                    <div class="content__ofertas__container__ofertas__oferta">
                        <div class="content__ofertas__container__ofertas__oferta__title">
                            <h3>Oferta de empleo 2</h3>
                        </div>
                        <div class="content__ofertas__container__ofertas__oferta__description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris.</p>
                        </div>
                        <div class="content__ofertas__container__ofertas__oferta__location">
                            <p>Ubicación: Barcelona</p-->


    </div>

@endsection
