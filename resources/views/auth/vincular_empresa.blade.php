@extends('layouts.plantilla_sin_footer')

@section('title', 'Vincular empresa')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleVincularEmpresa.css') }}">
@endsection

@section('content')

    <div class="content">
            
        <div class="vincular_empresa">

            <h2>Selecciona tu empresa</h2>

            <input type="text" name="id_empresa" id="id_empresa" placeholder="ID empresa" require>
            <input type="password" name="clave_acceso" id="clave_acceso" placeholder="Clave de acceso" require>

            <button>Seleccionar empresa</button>

        </div>
    
    </div>

    <div class="bloque"></div>

@endsection