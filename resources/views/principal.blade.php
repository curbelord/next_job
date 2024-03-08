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
    <link rel="stylesheet" href="{{ asset('build/assets/css/principal.css') }}">
@endsection

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

            <div class="provincia provincia_1-3">
                <div class="imagen_provincia">IMAGEN</div>
                <div class="nombre_provincia"> 
                    <span>
                        Provincia 1
                    </span>
                    <div class="vector_borde_azul"></div>
                </div>
            </div>

            <div class="provincia provincia_2-3">
                <div class="imagen_provincia">IMAGEN</div>
                <div class="nombre_provincia"> 
                    <span>
                        Provincia 2
                    </span>
                    <div class="vector_borde_azul"></div>
                </div>            </div>

            <div class="provincia provincia_3-3">
                <div class="imagen_provincia">IMAGEN</div>
                <div class="nombre_provincia"> 
                    <span>
                        Provincia 3
                    </span>
                    <div class="vector_borde_azul"></div>
                </div>            
            </div>
            
            <!--
            @foreach ($provincias as $provincia)

                @if ($j % 3 == 0)
                    <php $i++; ?>
                @endif

                @if (($j == 1) || ($j % 3 == 0))
                    <div class="provincia provincia_1-3" style="grid-row: {{ $i }};">
                        <div class="imagen_provincia">IMAGEN</div>
                        <div class="nombre_provincia">{{ $provincia }}</div>
                    </div>

                @elseif (($j == 2) || ($j % 3 == 1))
                    <div class="provincia provincia_2-3" style="grid-row: {{ $i }};">
                        <div class="imagen_provincia">IMAGEN</div>
                        <div class="nombre_provincia">{{ $provincia }}</div>
                    </div>
                @elseif (($j == 3) || ($j % 3 == 2))
                    <div class="provincia provincia_3-3" style="grid-row: {{ $i }};">
                        <div class="imagen_provincia">IMAGEN</div>
                        <div class="nombre_provincia">{{ $provincia }}</div>
                    </div>
                @endif

                <php $j++; ?>

            @endforeach
            -->

            <!-- 1 2 3
                 4 5 6
                 7 8 9
            -->
        
        </div>

        <div class="bloque"></div>

    </div>

@endsection
