<?php

  $titulo = 'Busca una empresa';
  $mostrarFiltros = false;
  $mostrarProvincias = false;
  $placeholder_buscador = 'Nombre';

?>


@extends('layouts.plantilla')

@section('title', 'Empresas')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleBuscador.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleEmpresas.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleComponenteEmpresa.css') }}">
@endsection

@section('content')

    <div class="content">

        @include('components.buscador')

    </div>

@endsection
