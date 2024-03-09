@extends('layouts.plantilla')

@section('title', 'Gestionar')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleGestionar.css') }}">
@endsection

@section('content')

    <div class="seccion_gestion">

        <h2>
            Bienvenid@
        </h2>

        <p>
            ¿Qué quieres hacer?
        </p>

        <div class="gestion gestion_1-3">
            <div class="imagen_gestion">IMAGEN</div>
            <div class="nombre_gestion">
                <span>
                    Gestionar ofertas
                </span>
                <div class="vector_borde_azul"></div>
            </div>
        </div>

        <div class="gestion gestion_2-3">
            <div class="imagen_gestion">IMAGEN</div>
            <div class="nombre_gestion"> 
                <span>
                    Gestionar plantillas
                </span>
                <div class="vector_borde_azul"></div>
            </div>            
        </div>

        <div class="gestion gestion_3-3">
            <div class="imagen_gestion">IMAGEN</div>
            <div class="nombre_gestion"> 
                <span>
                    Otra opción
                </span>
                <div class="vector_borde_azul"></div>
            </div>            
        </div>

    </div>

    <div class="bloque"></div>

@endsection