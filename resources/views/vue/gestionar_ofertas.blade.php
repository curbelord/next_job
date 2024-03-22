@extends('layouts.plantilla')

@section('title', 'Gestionar procesos')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleGestionarOfertas.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleComponenteProceso.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleNumeracionSlider.css') }}">

    <script src="https://unpkg.com/vue@3"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div id="container">

    </div>

    <script type="module" src="{{ asset('build/assets/js/gestionar_procesos.js') }}"></script>
@endsection
