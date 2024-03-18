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

                        <input type="file" id="fotoPerfil" class="input_formulario" name="fotoPerfil" value="Subir imagen perfil" placeholder="Subir imagen perfil">
                    </div>

                    <input type="text" id="direccionPostal" class="input_formulario" name="direccionPostal" placeholder="Dirección postal">

                    <input type="email" id="correoElectronico" class="input_formulario" name="correoElectronico" placeholder="Correo electrónico">
                </div>
                <div id="container_cvs">
                    <div id="titulo_cvs">
                        <h3>CV's</h3>
                    </div>
                    <div id="container_inputs_cvs">
                        {{-- Hacer un bucle para que en función de si hay currículums (forelse) imprima los inputs correspondientes con las id's acorde al número de CV --}}
                        <div class="container_input_cv">
                            <input type="text" id="nombreCV_1" class="input_formulario input_cv" name="nombreCV_1" placeholder="Nombre CV1">

                            <div class="eliminar_cv"></div>
                        </div>
                    </div>
                </div>

                <input type="submit" id="boton_actualizar_perfil" class="input_formulario" value="Actualizar perfil">
            </form>
        </div>
    </div>
@endsection
