<?php

    $familias_profesionales = [
        'Actividades Físicas y Deportivas',
        'Administración y Gestión',
        'Agroalimentario',
        'Artes Gráficas',
        'Construcción',
        'Energía',
        'Imagen Personal',
        'Imagen y Sonido',
        'Industrial',
        'Informática y Comunicaciones',
        'Logística, Transporte y Comercio',
        'Mantenimiento',
        'Medio Ambiente',
        'Químico',
        'Salud',
        'Servicios Turísticos y Hosteleros',
        'Textil'
    ];

    $tipo_trabajo = [
        'Presencial',
        'No presencial',
        'Mixto'
    ];

    $jornada = [
        'Completa',
        'Parcial'
    ];

    $turno = [
        'Mañana',
        'Tarde',
        'Noche'
    ];

    $estudios = [
        'Graduado Escolar',
        'ESO',
        'Bachillerato',
        'Formación Profesional Básica',
        'Ciclo Formativo de Grado Medio',
        'Ciclo Formativo de Grado Superior',
        'Enseñanzas artísticas',
        'Enseñanzas deportivas',
        'Licenciatura',
        'Máster',
        'Doctorado',
        'Grado universitario',
        'No requerida'
    ];
?>

@extends('layouts.plantilla')

@section('title', 'Crear plantilla')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCrearOferta.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_publica_oferta">
            <div id="titulo_publica_oferta">
                <h3>Crear plantilla</h3>
            </div>

            {{-- Posiblemente hacer que el botón "publicar" envíe la información mediante Laravel y el botón "guardar plantilla" mediante AJAX con JS --}}

            {{-- Pendiente añadir los names de los inputs iguales a los campos de la BBDD. Confirmar algunos campos --}}

            <form method="POST" action="{{ route('gestionar.ofertas.ofertas.almacenar') }}">
                @csrf

                <input type="text" id="titulo_crear_oferta" class="input_formulario" name="puesto_trabajo" placeholder="Título">

                <input type="text" id="centro_trabajo_oferta" class="input_formulario" name="ubicacion" placeholder="Ubicación del centro de trabajo">

                <div id="container_tipo_trabajo_sector">
                    <select id="tipo_trabajo_oferta" class="input_formulario" name="tipo_trabajo">
                        <option value="null" selected>Tipo de trabajo</option>
                        @foreach ($tipo_trabajo as $tipo)
                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                        @endforeach
                    </select>

                    <select id="sector_oferta" class="input_formulario" name="sector">
                        <option value="null" selected>Sector</option>
                        @foreach ($familias_profesionales as $familia)
                            <option value="{{ $familia }}">{{ $familia }}</option>
                        @endforeach
                    </select>
                </div>

                <textarea rows="10" id="descripcion_crear_oferta" class="input_formulario" name="descripcion" placeholder="Descripción"></textarea>

                <div id="container_estudios_experiencia">
                    <select id="select_estudios_crear_oferta" class="input_formulario" name="estudios_minimos">
                        <option value="null" selected>Estudios mínimos</option>
                        @foreach ($estudios as $estudio)
                            <option value="{{ $estudio }}">{{ $estudio }}</option>
                        @endforeach
                    </select>

                    <input type="number" id="experiencia_crear_oferta" class="input_formulario" name="experiencia_minima" placeholder="Experiencia mínima" min="0">
                </div>

                <div id="container_jornada_turno">
                    <select id="select_jornada_crear_oferta" class="input_formulario" name="jornada">
                        <option value="null" selected>Jornada</option>
                        @foreach ($jornada as $jornada)
                            <option value="{{ $jornada }}">{{ $jornada }}</option>
                        @endforeach
                    </select>

                    <select id="select_turno_crear_oferta" class="input_formulario" name="turno">
                        <option value="null" selected>Turno</option>
                        @foreach ($turno as $turno)
                            <option value="{{ $turno }}">{{ $turno }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="container_vacantes_salario">
                    <input type="number" id="vacantes_crear_oferta" class="input_formulario" name="numero_vacantes" placeholder="Nº vacantes" min="1">

                    <input type="number" id="salario_crear_oferta" class="input_formulario" name="salario" placeholder="Salario">
                </div>

                <div id="container_cierre_cuestionario">
                    <input type="text" onfocus="(this.type='date')"
                    onblur="(this.type='text')" id="cierre_crear_oferta" class="input_formulario" name="fecha_cierre" placeholder="Fecha cierre">

                    <button type="button" id="preguntas_crear_oferta" class="input_formulario">Killer questions</button>
                </div>

                <div id="container_cuestionario">
                    <div id="titulo_cuestionario">
                        <h3>Killer questions</h3>
                    </div>
                    <div id="preguntas_cuestionario">
                        <div class="pregunta">
                            <div class="titulo_pregunta">
                                <input type="text" id="titulo_pregunta_" class="input_formulario" name="titulo_pregunta_" placeholder="Pregunta">
                            </div>
                            <div class="tipo_pregunta">
                                <select id="select_tipo_pregunta" class="input_formulario" name="select_tipo_pregunta">
                                    <option value="Abierta">Abierta</option>
                                    <option value="Cerrada">Cerrada</option>
                                    <option value="null" selected>Abierta/cerrada</option>
                                </select>

                                {{-- Si la pregunta es abierta, entonces desplegar los campos para indicar las opciones que se permiten

                                    POSIBLEMENTE QUITAR EL SELECT Y AÑADIR UN INPUT TYPE RADIO, PORQUE EL SELECT IMPIDE HACER COSAS EN FUNCIÓN DE LA OPCIÓN ESCOGIDA

                                --}}

                            </div>
                        </div>
                    </div>
                </div>

                <div id="container_publicar_guardar_plantilla">
                    <button name="plantilla" id="guardar_plantilla" class="input_formulario" value="plantilla">Guardar plantilla</button>
                </div>
            </form>
        </div>
    </div>
@endsection
