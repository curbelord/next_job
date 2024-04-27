@extends('layouts.plantilla')

@section('title', 'Editar perfil')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleEditarDemandante.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_informacion_personal_cvs">
            <form method="POST" action="{{ route('perfil.editar_demandante', ['id' => Auth::id()]) }}">

                @csrf

                <div id="titulo_informacion_personal">
                    <h3>Información personal</h3>
                </div>
                <div id="container_inputs_informacion_personal">
                    <!--input type="text" id="nombreCVActual" class="input_formulario" name="nombreCV" placeholder="Nombre CV"-->

                    <input type="text" id="nombre" class="input_formulario" name="nombre" placeholder="Nombre" value="{{ $usuario->nombre }}">

                    <div id="container_fecha_nac_telefono_imagen">
                        <input type="date" onfocus="(this.type='date')" onblur="(this.type='text')" id="fechaNacimiento" class="input_formulario" name="fecha_nacimiento" placeholder="Fecha de nacimiento" value="{{ $usuario->fecha_nacimiento }}">

                        <input type="text" id="telefonoUsuario" class="input_formulario" name="telefono" placeholder="Teléfono" value="{{ $usuario->telefono }}">

                        <label for="fotoPerfil" class="input_formulario label_subida_foto">Subir imagen perfil</label>
                        <input type="file" id="fotoPerfil" name="fotoPerfil">
                    </div>

                    <input type="text" id="direccionPostal" class="input_formulario" name="direccion" placeholder="Dirección postal" value="{{ $usuario->direccion }}">

                    <input type="email" id="correoElectronico" class="input_formulario" name="email" placeholder="Correo electrónico" value="{{ $usuario->email }}">
                </div>

                <input type="submit" id="boton_actualizar_perfil" class="input_formulario" value="Editar perfil">
            </form>
        </div>
    </div>
@endsection
