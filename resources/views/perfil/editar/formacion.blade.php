@extends('layouts.plantilla')

@section('title', 'Editar formación')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleEditarFormacion.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_formacion">
            <div id="titulo_formacion">
                <h3>Formación</h3>
            </div>
            <form method="POST" action="#">
                @csrf
                @method('PUT')

                <input type="text" id="nombre_estudio" class="input_formulario" name="nombreEstudio" value="" placeholder="Nombre de formación">

                <input type="text" id="nombre_centro" class="input_formulario" name="nombreCentro" value="" placeholder="Nombre de centro">

                <div id="fecha_inicio_fecha_fin">
                    <input type="date" id="fecha_inicio" onfocus="(this.type='date')" onblur="(this.type='text')" class="input_formulario" name="fechaInicio" value="" placeholder="Fecha de inicio">

                    <input type="date" id="fecha_fin" onfocus="(this.type='date')" onblur="(this.type='text')" class="input_formulario" name="fechaFin" value="" placeholder="Fecha de fin">
                </div>

                <input type="submit" id="boton_actualizar_formacion" class="input_formulario" value="Actualizar formación">
            </form>
        </div>
    </div>
@endsection
