@extends('layouts.plantilla')

@section('title', 'Editar oferta')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCrearOferta.css') }}">
@endsection

<?php
    $tiposTrabajo = ["Presencial", "Teletrabajo", "Mixto"];
    $familias_profesionales = ['Actividades Físicas y Deportivas', 'Administración y Gestión', 'Agroalimentario', 'Artes Gráficas', 'Construcción', 'Energía', 'Imagen Personal', 'Imagen y Sonido', 'Industrial', 'Informática y Comunicaciones', 'Logística, Transporte y Comercio', 'Mantenimiento', 'Medio Ambiente', 'Químico', 'Salud', 'Servicios Turísticos y Hosteleros', 'Textil'];
    $estudios = ['Graduado Escolar', 'ESO', 'Bachillerato', 'Formación Profesional Básica', 'Ciclo Formativo de Grado Medio', 'Ciclo Formativo de Grado Superior', 'Enseñanzas artísticas', 'Enseñanzas deportivas', 'Licenciatura', 'Máster', 'Doctorado', 'Grado universitario', 'No requerida'
    ];
    $turnos = ["Mañana", "Tarde", "Noche"];
?>

@section('content')
    <div id="container">
        <div id="container_publica_oferta">
            <div id="titulo_publica_oferta">
                <h3>Edita una oferta</h3>
            </div>

            {{-- Posiblemente hacer que el botón "publicar" envíe la información mediante Laravel y el botón "guardar plantilla" mediante AJAX con JS --}}

            {{-- Pendiente añadir los names de los inputs iguales a los campos de la BBDD. Confirmar algunos campos --}}

            <form method="POST" action="{{ route('gestionar.ofertas.actualizar_oferta', $oferta->referencia) }}">
                @csrf
                @method('PUT')

                <input type="text" id="titulo_crear_oferta" class="input_formulario" name="puesto_trabajo" placeholder="Título" value="{{ $oferta->puesto_trabajo }}">

                <input type="text" id="centro_trabajo_oferta" class="input_formulario" name="ubicacion" placeholder="Ubicación del centro de trabajo" value="{{ $oferta->ubicacion }}">

                <div id="container_tipo_trabajo_sector">
                    <select id="tipo_trabajo_oferta" class="input_formulario" name="tipo_trabajo">
                        @foreach ($tiposTrabajo as $tipo)
                            @if ($oferta->tipo_trabajo == $tipo)
                                <option value="{{ $tipo }}" selected>{{ $tipo }}</option>
                            @else
                                <option value="{{ $tipo }}">{{ $tipo }}</option>
                            @endif
                        @endforeach
                    </select>

                    <select id="sector_oferta" class="input_formulario" name="sector">
                        @foreach ($familias_profesionales as $familia)
                            @if ($familia == $oferta->sector)
                                <option value="{{ $familia }}" selected>{{ $familia }}</option>
                            @else
                                <option value="{{ $familia }}">{{ $familia }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <textarea rows="10" id="descripcion_crear_oferta" class="input_formulario" name="descripcion" placeholder="Descripción">{{ $oferta->descripcion }}</textarea>

                <div id="container_estudios_experiencia">
                    <select id="select_estudios_crear_oferta" class="input_formulario" name="estudios_minimos">
                        @foreach ($estudios as $estudio)
                            @if ($estudio == $oferta->estudios_minimos)
                                <option value="{{ $estudio }}" selected>{{ $estudio }}</option>
                            @else
                                <option value="{{ $estudio }}">{{ $estudio }}</option>
                            @endif
                        @endforeach
                    </select>

                    <input type="number" id="experiencia_crear_oferta" class="input_formulario" name="experiencia_minima" placeholder="Experiencia mínima" min="0" value="{{ $oferta->experiencia_minima }}">
                </div>

                <div id="container_jornada_turno">
                    <select id="select_jornada_crear_oferta" class="input_formulario" name="jornada">
                        @if ($oferta->jornada == "Completa")
                            <option value="Completa" selected>Completa</option>
                            <option value="Parcial">Parcial</option>
                        @else
                            <option value="Completa">Completa</option>
                            <option value="Parcial" selected>Parcial</option>
                        @endif
                    </select>

                    <select id="select_turno_crear_oferta" class="input_formulario" name="turno">
                        @foreach ($turnos as $turno)
                            @if ($turno == $oferta->turno)
                                <option value="{{ $turno }}" selected>{{ $turno }}</option>
                            @else
                                <option value="{{ $turno }}">{{ $turno }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div id="container_vacantes_salario">
                    <input type="number" id="vacantes_crear_oferta" class="input_formulario" name="numero_vacantes" placeholder="Nº vacantes" min="1" value="{{ $oferta->numero_vacantes }}">

                    <input type="number" id="salario_crear_oferta" class="input_formulario" name="salario" placeholder="Salario" value="{{ $oferta->salario }}">
                </div>

                <div id="container_cierre_cuestionario">
                    <input type="text" onfocus="(this.type='date')"
                    onblur="(this.type='text')" id="cierre_crear_oferta" class="input_formulario" name="fecha_cierre" placeholder="Fecha cierre" value="{{ $oferta->fecha_cierre }}">

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
                    <input name="publicada" type="submit" id="enviar_oferta" class="input_formulario" value="Editar">
                </div>
            </form>
        </div>
    </div>
@endsection
