@extends('layouts.plantilla')

@section('title', 'Desplegable')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleDesplegable.css') }}">
@endsection

<?php
    // Añadir aquí los elementos que irían en cada filtro

    $elementos = [["Elemento 1", "Elemento 2", "Elemento 3"],["Elemento 4", "Elemento 5", "Elemento 6"],["Elemento 7", "Elemento 8", "Elemento 9"], ["Elemento 10", "Elemento 11", "Elemento 12"], ["Elemento 13", "Elemento 14", "Elemento 15"]];

    $nombreFiltro = ["Fecha", "Tipo de trabajo", "Categoría", "Experiencia", "Jornada"];
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
                    <li>
                        <button>{{ $elementos[$j][$i] }}</button>
                    </li>
                @endfor
            @endslot
            {{ $i = 0 }}
        @endcomponent
    @endfor

@endsection
