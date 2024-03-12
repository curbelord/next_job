@extends('layouts.plantilla_sin_footer')

@section('title', 'Inicio de sesión')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleInicio_de_sesion.css') }}">
@endsection

@section('content')

    <div class="content">
            
        <form class="login">

            @csrf

            <h2>Inicio de sesión</h2>

            <input type="email" name="email" id="email" placeholder="Correo electrónico" required autofocus autocomplete="username">
            <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required autocomplete="current-password">

            <button>Iniciar sesión</button>

            <p>
                ¿No tienes una cuenta?
                <a href="{{ url('/registro') }}">Registrar</a>
            </p>

        </form>
    
    </div>

    <div class="bloque"></div>

@endsection