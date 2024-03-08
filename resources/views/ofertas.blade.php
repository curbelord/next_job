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

?>

@extends('layouts.plantilla')

@section('title', 'Principal')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleOfertas.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleBuscador.css') }}">
@endsection

@section('content')

    <div class="content">

        @include('components.buscador')


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
