@extends('layouts.plantilla')

@section('title', 'Crear oferta')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCrearOferta.css') }}">
@endsection

@section('content')

    <div class="crear_oferta">

        <h2>Crear una oferta</h2>

        <input type="text" name="titulo" id="titulo" placeholder="Título" require>
        <input type="text" name="centro_trabajo" id="centro_trabajo" placeholder="Centro de trabajo">
        <input type="text" name="jornada" id="jornada" placeholder="Jornada">
        <input type="text" name="horario" id="horario" placeholder="Horario">
        <input type="text" name="n_vacantes" id="n_vacantes" placeholder="Número de vacantes">
        <input type="text" name="salario" id="salario" placeholder="Salario">
        <input type="text" name="killer_questions" id="killer_questions" placeholder="Killer questions">

        <button class="crear_oferta_boton">Crear</button>

        <button class="guardar_plantilla_boton">Guardar como plantilla</button>

    </div>

@endsection