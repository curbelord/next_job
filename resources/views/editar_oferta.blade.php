@extends('layouts.plantilla')

@section('title', 'Editar oferta')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleEditarOferta.css') }}">
@endsection

@section('content')

    <div class="content">
            
        <div class="editar_oferta">

            <h2>Editar una oferta</h2>

            <input type="text" name="titulo" id="titulo" placeholder="Título" require>
            <input type="text" name="centro_trabajo" id="centro_trabajo" placeholder="Centro de trabajo">
            <input type="text" name="jornada" id="jornada" placeholder="Jornada">
            <input type="text" name="horario" id="horario" placeholder="Horario">
            <input type="text" name="n_vacantes" id="n_vacantes" placeholder="Número de vacantes">
            <input type="text" name="salario" id="salario" placeholder="Salario">
            <input type="text" name="killer_questions" id="killer_questions" placeholder="Killer questions">

            <button class="editar_oferta">Crear</button>

            <button class="guardar_como">Guardar como plantilla</button>

        </div>
    
    </div>

@endsection