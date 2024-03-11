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

            <form method="POST" action="#">
                @csrf

                <input type="text" id="titulo_crear_oferta" class="input_formulario" name="puesto_trabajo" placeholder="Título">

                <input type="text" id="centro_trabajo_oferta" class="input_formulario" name="descripcion" placeholder="Centro de trabajo">

                <textarea rows="10" id="descripcion_crear_oferta" class="input_formulario" name="descripcion_crear_oferta" placeholder="Descripción"></textarea>

                <div id="container_jornada_horario">
                    <input type="text" id="jornada_crear_oferta" class="input_formulario" name="jornada_crear_oferta" placeholder="Jornada">

                    <input type="text" id="horario_crear_oferta" class="input_formulario" name="horario_crear_oferta" placeholder="Horario">
                </div>

                <div id="container_vacantes_salario">
                    <input type="text" id="vacantes_crear_oferta" class="input_formulario" name="vacantes_crear_oferta" placeholder="Nº vacantes">

                    <input type="number" id="salario_crear_oferta" class="input_formulario" name="salario_crear_oferta" placeholder="Salario">
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
