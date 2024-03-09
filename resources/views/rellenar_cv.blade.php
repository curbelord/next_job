@extends('layouts.plantilla_sin_footer')

@section('title', 'Rellenar CV')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleRellenarCV.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleEstudiosExperiencia.css') }}">
@endsection

@section('content')

    <div class="content">
            
        <div class="rellenar_cv">

            <h2>Currículum</h2>

            <input type="text" name="subir_cv" id="subir_cv" placeholder="Subir CV">
            <input type="text" name="telefono" id="telefono" placeholder="Teléfono">

        </div>

        
        @include('components.estudios_experiencia', ['title' => 'Estudios', 'tipo' => 'estudio', 'centro' => 'Escuela'])

        @include('components.estudios_experiencia', ['title' => 'Experiencia', 'tipo' => 'experiencia', 'centro' => 'Empresa'])


        <div class="preferencias">
            
            <div class="contenedor_titulo">
                <h2>Preferencias</h2>
            </div>

            <div class="contenedor_contenido">

                <div class="contenedor_input">
                    <input type="text" name="puesto" id="puesto" placeholder="Puesto">
                    <input type="text" name="categoria" id="categoria" placeholder="Categoría">
                    <input type="text" name="jornada" id="jornada" placeholder="Jornada">
                    <input type="text" name="turno" id="turno" placeholder="Turno">
                </div>

            </div>

        </div>

        <div class="rellenar_cv">

            <button>Guardar</button>

        </div>

        <div class="bloque"></div>

    </div>

@endsection