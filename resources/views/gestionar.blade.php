@extends('layouts.plantilla')

@section('title', 'Gestionar')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleGestionar.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleUltimoProceso.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_bienvenida_seleccionador">
            <h3>Bienvenid@, NombreSeleccionador</h3>
            <p>¿Qué quieres hacer?</p>
        </div>

        <div id="container_seccion_gestion">
            <div id="bloque_gestion_1" class="bloque_gestion">
                <div class="imagen_gestion"></div>
                <div class="texto_gestion">
                    <a href="#">Publicar proceso</a>
                </div>
            </div>
            <div id="bloque_gestion_2" class="bloque_gestion">
                <div class="imagen_gestion"></div>
                <div class="texto_gestion">
                    <a href="#">Gestionar proceso</a>
                </div>
            </div>
            <div id="bloque_gestion_3" class="bloque_gestion">
                <div class="imagen_gestion"></div>
                <div class="texto_gestion">
                    <a href="#">Crear plantilla</a>
                </div>
            </div>
        </div>

        <div id="container_ultimos_procesos">
            <div id="titulo_ultimos_procesos">
                <h3>Últimos procesos</h3>
            </div>
            <div id="subcontainer_ultimos_procesos">
                @component('components.ultimo_proceso')

                @endcomponent
            </div>
        </div>
    </div>
@endsection
