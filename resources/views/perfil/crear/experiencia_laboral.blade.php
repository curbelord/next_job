@extends('layouts.plantilla')

@section('title', 'Añadir experiencia laboral')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleEditarExperiencia.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_experiencia_laboral">
            <div id="titulo_experiencia_laboral">
                <h3>Experiencia laboral</h3>
            </div>
            <form method="POST" action="{{ route('perfil.editar.experiencia_laboral', ['id_cv' => $cv->id, 'id' => $exp->id_experiencia]) }}">
                @csrf

                <input type="text" id="nombre_trabajo" class="input_formulario" name="nombre" value="" placeholder="Puesto de trabajo">

                <input type="text" id="nombre_empresa" class="input_formulario" name="centro_laboral" value="" placeholder="Nombre de empresa">

                <div id="fecha_inicio_fecha_fin">
                    <input type="date" id="fecha_inicio" onfocus="(this.type='date')" onblur="(this.type='text')" class="input_formulario" name="fecha_inicio" value="" placeholder="Fecha de inicio">

                    <input type="date" id="fecha_fin" onfocus="(this.type='date')" onblur="(this.type='text')" class="input_formulario" name="fecha_fin" value="" placeholder="Fecha de fin">
                </div>

                <textarea rows="10" id="descripcion_oferta" class="input_formulario" name="descripcion" placeholder="Descripción"></textarea>

                <input type="submit" id="boton_actualizar_experiencia" class="input_formulario" value="Añadir experiencia">
            </form>
        </div>
    </div>
@endsection
