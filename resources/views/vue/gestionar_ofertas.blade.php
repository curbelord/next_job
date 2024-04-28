@extends('layouts.plantilla')

@section('title', 'Gestionar procesos')

@section('style')
    {{-- Estilos Gestionar procesos --}}

    <link rel="stylesheet" href="{{ asset('build/assets/css/styleGestionarOfertas.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleComponenteProceso.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleNumeracionSlider.css') }}">

    {{-- Estilos Editar proceso --}}

    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCrearOferta.css') }}">

    {{-- Estilos Ver proceso --}}

    <link rel="stylesheet" href="{{ asset('build/assets/css/styleVerOferta.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCurriculumSimplificado.css') }}">

    {{-- Estilos Perfil demandante --}}

    <link rel="stylesheet" href="{{ asset('build/assets/css/stylePerfilDemandante.css') }}">


    {{-- <script src="https://unpkg.com/vue@3"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <div id="container">

    </div>

    <script type="module" src="{{ asset('build/assets/js/gestion_procesos/gestionar_procesos.js') }}" data-id="{{ $id }}"></script>
@endsection
