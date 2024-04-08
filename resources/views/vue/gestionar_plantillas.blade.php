@extends('layouts.plantilla')

@section('title', 'Principal procesos')

@section('style')

    <link rel="stylesheet" href="{{ asset('build/assets/css/styleGestionarOfertas.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleComponentePlantilla.css') }}">

    <script src="https://unpkg.com/vue@3"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <div id="container">

    </div>

    <script type="module" src="{{ asset('build/assets/js/gestion_plantillas/gestionar_plantillas.js') }}"></script>
@endsection
