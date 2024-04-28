@extends('layouts.plantilla')

@section('title', 'Desplegable')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleDesplegable.css') }}">
@endsection

<?php
    // Añadir aquí los elementos que irían en cada filtro

    $elementos = [["Cualquier fecha", "Últimas 24 horas", "Últimos 3 días", "Últimos 7 días"], ["Presencial", "No presencial", "Mixto"], ["Actividades Físicas y Deportivas", "Administración y Gestión", "Agroalimentario", "Artes Gráficas", "Construcción", "Energía", "Imagen Personal", "Imagen y Sonido", "Industrial", "Informática y Comunicaciones", "Logística, Transporte y Comercio", "Mantenimiento", "Medio Ambiente", "Químico", "Salud", "Servicios Turísticos y Hosteleros", "Textil"], ["Elemento 1"], ["Completa", "Parcial"]];

    $tipoTrabajosInputs = ["presencial", "no_presencial", "mixto"];
    $nombreFiltro = ["Fecha de publicación", "Tipo de trabajo", "Sector", "Experiencia", "Jornada"];
    $i = 0;
?>

@section('content')

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
                                <input type="radio" name="fecha_publicacion" class="input_accionable radio_button_busqueda" value="{{ $elementos[$j][$i] }}">
                            </div>
                            <div class="container_boton_desplegable">
                                <button id="desplegable_{{ $j }}_{{ $i }}" class="boton_o_select_desplegable">{{ $elementos[$j][$i] }}</button>
                            </div>
                        </li>

                    @elseif ($j == 1 || $j == 4)
                        <li>
                            <div class="container_input_accionable">
                                <input type="checkbox" name="{{ $tipoTrabajosInputs[$i] }}" class="input_accionable checkbox_busqueda" value="{{ $elementos[$j][$i] }}">
                            </div>
                            <div class="container_boton_desplegable">
                                <button id="desplegable_{{ $j }}_{{ $i }}" class="boton_o_select_desplegable">{{ $elementos[$j][$i] }}</button>
                            </div>
                        </li>

                    @elseif ($j == 2)
                        <li>
                            <div class="container_boton_desplegable">
                                <select id="desplegable_{{ $j }}_{{ $i }}" id="select_sectores" class="boton_o_select_desplegable">
                                    @foreach ($elementos[$j] as $sector)
                                        <option value="{{ $sector }}">{{ $sector }}</option>
                                    @endforeach
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
                            <p id="valor">5</p>
                        </li>

                        @php
                            $i = count($elementos[$j])
                        @endphp

                    @endif
                @endfor
            @endslot
            {{ $i = 0 }}
        @endcomponent
    @endfor

    <script src="{{ asset('build/assets/js/js_vistas/desplegable.js') }}"></script>
@endsection
