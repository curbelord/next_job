@extends('layouts.plantilla')

@section('title', 'Crear oferta')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCrearOferta.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_publica_oferta">
            <div id="titulo_publica_oferta">
                <h3>Publica una oferta</h3>
            </div>

            {{-- Posiblemente hacer que el botón "publicar" envíe la información mediante Laravel y el botón "guardar plantilla" mediante AJAX con JS --}}

            {{-- Pendiente añadir los names de los inputs iguales a los campos de la BBDD. Confirmar algunos campos --}}

            <form method="POST" action="{{ route('ofertas.almacenar') }}">
                @csrf

                <input type="text" id="titulo_crear_oferta" class="input_formulario" name="puesto_trabajo" placeholder="Título">

                <input type="text" id="centro_trabajo_oferta" class="input_formulario" name="ubicacion" placeholder="Centro de trabajo">

                <textarea rows="10" id="descripcion_crear_oferta" class="input_formulario" name="descripcion" placeholder="Descripción"></textarea>

                <div id="container_jornada_horario">
                    <select id="select_jornada_crear_oferta" class="input_formulario" name="jornada">
                        <option value="null" selected>Jornada</option>
                        <option value="completa">Completa</option>
                        <option value="parcial">Parcial</option>
                    </select>

                    <select id="select_turno_crear_oferta" class="input_formulario" name="turno">
                        <option value="null" selected>Turno</option>
                        <option value="manana">Mañana</option>
                        <option value="tarde">Tarde</option>
                        <option value="noche">Noche</option>
                    </select>
                </div>

                <div id="container_vacantes_salario">
                    <input type="number" id="vacantes_crear_oferta" class="input_formulario" name="numero_vacantes" placeholder="Nº vacantes" min="1">

                    <input type="number" id="salario_crear_oferta" class="input_formulario" name="salario" placeholder="Salario">
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
                                    <option value="abierta">Abierta</option>
                                    <option value="cerrada">Cerrada</option>
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
                    <input type="submit" id="enviar_oferta" class="input_formulario" value="Publicar">

                    <button id="guardar_plantilla" class="input_formulario">Guardar plantilla</button>
                </div>
            </form>
        </div>
    </div>
@endsection
