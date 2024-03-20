@extends('layouts.plantilla')

@section('title', 'Editar experiencia laboral')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleEditarExperiencia.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_experiencia_laboral">
            <div id="titulo_experiencia_laboral">
                <h3>Experiencia laboral</h3>
            </div>
            <form method="POST" action="#">
                @csrf
                @method('PUT')

                <input type="text" id="nombre_trabajo" class="input_formulario" name="nombreTrabajo" value="" placeholder="Puesto de trabajo">

                <input type="text" id="nombre_empresa" class="input_formulario" name="nombreEmpresa" value="" placeholder="Nombre de empresa">

                <div id="fecha_inicio_fecha_fin">
                    <input type="date" id="fecha_inicio" onfocus="(this.type='date')" onblur="(this.type='text')" class="input_formulario" name="fechaInicio" value="" placeholder="Fecha de inicio">

                    <input type="date" id="fecha_fin" onfocus="(this.type='date')" onblur="(this.type='text')" class="input_formulario" name="fechaFin" value="" placeholder="Fecha de fin">
                </div>

                <textarea rows="10" id="descripcion_oferta" class="input_formulario" name="descripcionOferta" placeholder="Descripción"></textarea>

                <input type="submit" id="boton_actualizar_experiencia" class="input_formulario" value="Actualizar experiencia">
            </form>
        </div>
    </div>
@endsection
