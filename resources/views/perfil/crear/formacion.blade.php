@extends('layouts.plantilla')

@section('title', 'Añadir formación')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCrearFormacion.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_formacion">

            <div class="container_boton_volver">
                <a href="{{ url()->previous() }}">Volver</a>
            </div>

            <div id="titulo_formacion">
                <h3>Formación</h3>
            </div>
            <form method="POST" action="{{ route('perfil.crear.formacion') }}">
                @csrf

                <input type="text" id="nombre_estudio" class="input_formulario" name="nombre" value="" placeholder="Nombre de formación">

                <input type="text" id="nombre_centro" class="input_formulario" name="centro_estudios" value="" placeholder="Nombre de centro">

                <div id="fecha_inicio_fecha_fin">
                    <input type="date" id="fecha_inicio" onfocus="(this.type='date')" onblur="(this.type='text')" class="input_formulario" name="fecha_inicio" value="" placeholder="Fecha de inicio">

                    <input type="date" id="fecha_fin" onfocus="(this.type='date')" onblur="(this.type='text')" class="input_formulario" name="fecha_fin" value="" placeholder="Fecha de fin">
                </div>

                <input type="submit" id="boton_actualizar_formacion" class="input_formulario" value="Añadir formación">
            </form>
        </div>
    </div>
@endsection
