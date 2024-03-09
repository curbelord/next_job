@extends('layouts.plantilla')

@section('title', 'Crear plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCrearPlantilla.css') }}">
@endsection

@section('content')

    <div class="content">
            
        <div class="crear_plantilla">

            <h2>Crea una plantilla</h2>

            <input type="text" name="titulo" id="titulo" placeholder="Título" require>
            <input type="text" name="centro_trabajo" id="centro_trabajo" placeholder="Centro de trabajo">
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripción"></textarea>
            <input type="text" name="jornada" id="jornada" placeholder="Jornada">
            <input type="text" name="horario" id="horario" placeholder="Horario">
            <input type="text" name="n_vacantes" id="n_vacantes" placeholder="Número de vacantes">
            <input type="text" name="salario" id="salario" placeholder="Salario">
            <input type="text" name="killer_questions" id="killer_questions" placeholder="Killer questions">

            <button>Crear</button>

        </div>

    </div>

@endsection