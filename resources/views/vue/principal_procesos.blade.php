@extends('layouts.plantilla')

@section('title', 'Principal procesos')

@section('style')
    {{-- Estilos publicar_proceso --}}

    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCrearOferta.css') }}">

    {{-- Estilos principal_procesos --}}

    <link rel="stylesheet" href="{{ asset('build/assets/css/stylePrincipalEmpresa.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleUltimoProceso.css') }}">


    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <div id="container">

    </div>

    <script type="module" src="{{ asset('build/assets/js/principal_procesos.js') }}" data-id="{{ $id }}"></script>
@endsection
