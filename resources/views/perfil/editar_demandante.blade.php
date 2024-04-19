@extends('layouts.plantilla')

@section('title', 'Editar perfil')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleEditarDemandante.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_informacion_personal_cvs">
            <form method="POST" action="#">
                @csrf
                @method('PUT')

                <div id="titulo_informacion_personal">
                    <h3>Información personal</h3>
                </div>
                <div id="container_inputs_informacion_personal">
                    <input type="text" id="nombreCVActual" class="input_formulario" name="nombreCV" placeholder="Nombre CV">

                    <input type="text" id="nombre" class="input_formulario" name="nombre" placeholder="Nombre">

                    <div id="container_fecha_nac_telefono_imagen">
                        <input type="date" onfocus="(this.type='date')" onblur="(this.type='text')" id="fechaNacimiento" class="input_formulario" name="fechaNacimiento" placeholder="Fecha de nacimiento">

                        <input type="number" id="telefonoUsuario" class="input_formulario" name="telefono" placeholder="Teléfono">

                        <label for="fotoPerfil" class="input_formulario label_subida_foto">Subir imagen perfil</label>
                        <input type="file" id="fotoPerfil" name="fotoPerfil">
                    </div>

                    <input type="text" id="direccionPostal" class="input_formulario" name="direccionPostal" placeholder="Dirección postal">

                    <input type="email" id="correoElectronico" class="input_formulario" name="correoElectronico" placeholder="Correo electrónico">
                </div>

                <input type="submit" id="boton_actualizar_perfil" class="input_formulario" value="Editar perfil">
            </form>
        </div>
    </div>
@endsection
