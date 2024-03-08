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
  $style = `<link rel="stylesheet" href="{{ asset('build/assets/css/principal.css') }}">`;
?>

@extends('layouts.plantilla')

@section('title', 'Principal')

@section('content')

    <div class="content">

        <div class="seccion_buscador">

            <h2>Busca un empleo</h2>

            <input type="text" name="buscador" id="buscador" placeholder="Puesto, localidad, categoría...">

            <select name="provincia" id="provincia">
                <option value="0">Selecciona una provincia</option>

                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia }}">{{ $provincia }}</option>
                @endforeach
                
            </select>

            <button type="button">Buscar</button>

        </div>

        <div class="bloque"></div>

        <div class="seccion_relleno">
            <div>IMAGEN</div>

            <span>Encuentra el trabajo que buscas</span>
        </div>

        <div class="bloque"></div>

        <div class="seccion_valor">
            <span>Encuentra el trabajo que buscas</span>

            <div>IMAGEN</div>
        </div>

        <div class="bloque"></div>

        <div class="seccion_provincias">

            <h2>Empleo por provincias</h2>

            @foreach ($provincias as $provincia)
                <div class="provincia">
                    <div class="imagen_provincia">IMAGEN</div>
                    <div class="nombre_provincia">{{ $provincia }}</div>
                </div>
            @endforeach

            <!--div class="provincia">

                <div class="imagen_provincia">IMAGEN</div>

                <div class="nombre_provincia">PROVINCIA</div>

            </div>

            <div class="provincia">

                <div class="imagen_provincia">IMAGEN</div>

                <div class="nombre_provincia">PROVINCIA</div>

            </div>

            <div class="provincia">

                <div class="imagen_provincia">IMAGEN</div>

                <div class="nombre_provincia">PROVINCIA</div>

            </div-->

        </div>

        <div class="bloque"></div>

    </div>

@endsection
