@extends('layouts.plantilla')

@section('title', 'Registrar empresa')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleRegistrarEmpresa.css') }}">
@endsection

@section('content')

    <div class="content">
            
        <form class="registrar_empresa" method="POST" action="{{ route('auth.registrar_empresa.almacenar') }}">

            @csrf

            <h2>Registrar una empresa</h2>

            <input type="text" name="nombre" id="nombre" placeholder="Nombre" require>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripción"></textarea>
            <input type="file" name="subir_archivo" id="subir_archivo" accept=".png, .jpg, .jpeg">
            <input type="text" name="ubicacion_sede" id="ubicacion_sede" placeholder="Ubicación sede">
            <input type="password" name="clave_acceso" id="clave_acceso" placeholder="Clave de acceso" require>
            <input type="password" name="confirmar_clave" id="confirmar_clave" placeholder="Confirmar clave de acceso" require>

            <button>Registrar empresa</button>

            <p>
                <a href="{{ url('/vincular-empresa') }}">¿Ya tienes una empresa registrada?</a>
            </p>

        </form>
    
    </div>

    <div class="bloque"></div>

@endsection