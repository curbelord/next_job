@extends('layouts.plantilla_sin_footer')

@section('title', 'Registro')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleRegistro.css') }}">
@endsection

@section('content')

    <div class="content">
            
        <form class="registro">

            @csrf

            <h2>Registro</h2>

            <input type="text" name="nombre" id="nombre" placeholder="Nombre" require>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" require>
            <input type="text" name="genero" id="genero" placeholder="Género">
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de nacimiento" require>
            <input type="text" name="direccion" id="direccion" placeholder="Dirección Postal">
            <input type="email" name="email" id="email" placeholder="Correo electrónico" require>
            <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" require>
            <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" placeholder="Repita la contraseña" require>

            <button>Registrar</button>

            <p>
                ¿Tienes una cuenta?
                <a href="{{ url('/inicio-de-sesion') }}">Inicia sesión</a>
            </p>

        </form>
    
    </div>

    <div class="bloque"></div>

@endsection