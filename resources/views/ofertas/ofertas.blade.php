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

    // Variables para desplegable filtros

    $elementos = [["Cualquier fecha", "Últimas 24 horas", "Últimos 3 días", "Últimos 7 días"], ["Presencial", "No presencial", "Mixto"], ["Actividades Físicas y Deportivas", "Administración y Gestión", "Agroalimentario", "Artes Gráficas", "Construcción", "Energía", "Imagen Personal", "Imagen y Sonido", "Industrial", "Informática y Comunicaciones", "Logística, Transporte y Comercio", "Mantenimiento", "Medio Ambiente", "Químico", "Salud", "Servicios Turísticos y Hosteleros", "Textil"], ["Elemento 1"], ["Completa", "Parcial"]];

    $tipoTrabajosInputs = ["presencial", "no_presencial", "mixto"];
    $nombreFiltro = ["Fecha de publicación", "Tipo de trabajo", "Sector", "Experiencia", "Jornada"];
    $selectRecibido = false;
    $i = 0;

?>

@extends('layouts.plantilla')

@section('title', 'Ofertas de empleo')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleOfertas.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleFiltros.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleBuscador.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleNumeracionSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleDesplegable.css') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="content">

        <div class="seccion_buscador">
            <div class="container_boton_volver">
                <a href="{{ route('principal') }}">Volver</a>
            </div>

            <form method="GET" action="{{ route('ofertas.ofertas', $offset) }}">
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

                <div class="tabla_filtros">
                    @if ($mostrarFiltros)
                        @for($j = 0; $j < 5; $j++)
                            @component('components.desplegable')
                                @slot('nombreBoton')
                                    {{ "boton_desplegar_$j" }}
                                @endslot
                                @slot('nombreFiltro')
                                    {{ $nombreFiltro[$j] }}
                                @endslot
                            @endcomponent
                        @endfor


                        <div id="container_listas_desplegables">
                            @for($j = 0; $j < 5; $j++)
                                @component('components.lista_desplegable')
                                    @slot('numeroLista')
                                        {{ $j }}
                                    @endslot

                                    @slot('elementos')
                                        @for (; $i < count($elementos[$j]); $i++)
                                            @if($j == 0)
                                                <li>
                                                    <div class="container_input_accionable">
                                                        @if($elementos[$j][$i] == $fecha_publicacion)
                                                            <input type="radio" name="fecha_publicacion" class="input_accionable radio_button_busqueda" value="{{ $elementos[$j][$i] }}" checked>
                                                        @else
                                                            <input type="radio" name="fecha_publicacion" class="input_accionable radio_button_busqueda" value="{{ $elementos[$j][$i] }}">
                                                        @endif
                                                    </div>
                                                    <div class="container_boton_desplegable">
                                                        <button id="desplegable_{{ $j }}_{{ $i }}" class="boton_o_select_desplegable">{{ $elementos[$j][$i] }}</button>
                                                    </div>
                                                </li>

                                            @elseif ($j == 1)
                                                <li>
                                                    <div class="container_input_accionable">
                                                        @if(str_contains($tipo_trabajo, $elementos[$j][$i]))
                                                            <input type="checkbox" name="{{ $tipoTrabajosInputs[$i] }}" class="input_accionable checkbox_busqueda" value="true" checked>
                                                        @else
                                                            <input type="checkbox" name="{{ $tipoTrabajosInputs[$i] }}" class="input_accionable checkbox_busqueda" value="true">
                                                        @endif
                                                    </div>
                                                    <div class="container_boton_desplegable">
                                                        <button id="desplegable_{{ $j }}_{{ $i }}" class="boton_o_select_desplegable">{{ $elementos[$j][$i] }}</button>
                                                    </div>
                                                </li>

                                            @elseif ($j == 2)
                                                <li>
                                                    <div class="container_boton_desplegable">
                                                        <select id="desplegable_{{ $j }}_{{ $i }}" id="select_sectores" class="boton_o_select_desplegable" name="sector">
                                                            @foreach ($elementos[$j] as $sectorActual)
                                                                @if($sector == $sectorActual)
                                                                    @php
                                                                        $selectRecibido = true;
                                                                    @endphp
                                                                    <option value="{{ $sectorActual }}" selected>{{ $sectorActual }}</option>
                                                                @else
                                                                    <option value="{{ $sectorActual }}">{{ $sectorActual }}</option>
                                                                @endif
                                                            @endforeach

                                                            @if($selectRecibido == false)
                                                                <option value="" disabled selected>Selecciona un sector</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </li>

                                                @php
                                                    $i = count($elementos[$j])
                                                @endphp

                                            @elseif ($j == 3)
                                                <li id="li_barra_experiencia">
                                                    <div class="barra">
                                                        <div id="boton" class="boton"></div>
                                                    </div>
                                                    <p id="valor">5 años</p>
                                                </li>

                                                @php
                                                    $i = count($elementos[$j])
                                                @endphp

                                            @elseif ($j == 4)
                                                <li>
                                                    <div class="container_input_accionable">
                                                        @if(str_contains($jornada, $elementos[$j][$i]))
                                                            <input type="checkbox" name="{{ strtolower($elementos[$j][$i]) }}" class="input_accionable checkbox_busqueda" value="true" checked>
                                                        @else
                                                            <input type="checkbox" name="{{ strtolower($elementos[$j][$i]) }}" class="input_accionable checkbox_busqueda" value="true">
                                                        @endif
                                                    </div>
                                                    <div class="container_boton_desplegable">
                                                        <button id="desplegable_{{ $j }}_{{ $i }}" class="boton_o_select_desplegable">{{ $elementos[$j][$i] }}</button>
                                                    </div>
                                                </li>
                                            @endif
                                        @endfor
                                    @endslot
                                    {{ $i = 0 }}
                                @endcomponent
                            @endfor
                        </div>


                    @endif
                </div>

                <div class="tabla">
                    <button id="boton_envio_formulario" type="submit">Buscar</button>
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
