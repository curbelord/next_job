@extends('layouts.plantilla')

@section('title', 'Gestionar')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/stylePrincipalEmpresa.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleUltimoProceso.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_bienvenida_seleccionador">
            <h3>
                @auth
                    Bienvenid@, {{ Auth::user()->nombre }}
                @endauth
            </h3>
            <p>¿Qué quieres hacer?</p>
        </div>

        <div id="container_seccion_gestion">
            <div id="bloque_gestion_1" class="bloque_gestion">
                <div class="imagen_gestion"></div>
                <div class="texto_gestion">
                    <a href="{{ route('gestionar.ofertas.crear_oferta') }}">Publicar proceso</a>
                </div>
            </div>
            <div id="bloque_gestion_2" class="bloque_gestion">
                <div class="imagen_gestion"></div>
                <div class="texto_gestion">
                    <a href="{{ route('gestionar.gestionar_ofertas') }}">Gestionar proceso</a>
                </div>
            </div>
            <div id="bloque_gestion_3" class="bloque_gestion">
                <div class="imagen_gestion"></div>
                <div class="texto_gestion">
                    <a href="{{ route('gestionar.plantillas.crear_plantilla') }}">Crear plantilla</a>
                </div>
            </div>
        </div>

        <div id="container_ultimos_procesos">
            <div id="titulo_ultimos_procesos">
                <h3>Últimos procesos</h3>
            </div>
            <div id="subcontainer_ultimos_procesos">
                @forelse ($ofertas as $oferta)
                    @component('components.ultimo_proceso')
                        @slot('puesto_trabajo')
                            {{ $oferta->puesto_trabajo }}
                        @endslot

                        @slot('ubicacion')
                            {{ $oferta->ubicacion }}
                        @endslot

                        @slot('fecha_publicacion')
                            {{ date('d/m/Y', strtotime($oferta->created_at)) }}
                        @endslot

                        @slot('numero_inscritos')
                            {{ $oferta->inscripciones->count() }}
                        @endslot
                    @endcomponent
                @empty
                    <div class="container_oferta">
                        <div class="datos_top">
                            <div class="titulo_oferta">
                                <h3>No hay procesos</h3>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
