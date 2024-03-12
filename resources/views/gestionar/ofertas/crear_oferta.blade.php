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

            <form method="POST" action="{{ route('gestionar.ofertas.ofertas.almacenar') }}">
                @csrf

                <input type="text" id="titulo_crear_oferta" class="input_formulario" name="puesto_trabajo" placeholder="Título">

                <input type="text" id="centro_trabajo_oferta" class="input_formulario" name="ubicacion" placeholder="Centro de trabajo">

                <div id="container_tipo_trabajo_sector">
                    <select id="tipo_trabajo_oferta" class="input_formulario" name="tipo_trabajo">
                        <option value="null" selected>Tipo de trabajo</option>
                        <option value="presencial">Presencial</option>
                        <option value="no_presencial">Teletrabajo</option>
                    </select>

                    <select id="sector_oferta" class="input_formulario" name="sector">
                        <option value="null" selected>Sector</option>
                        <option value="afde">Actividades Físicas y Deportivas</option>
                        <option value="ages">Administración y Gestión</option>
                        <option value="agro">Agroalimentario</option>
                        <option value="agra">Artes Gráficas</option>
                        <option value="cons">Construcción</option>
                        <option value="ener">Energía</option>
                        <option value="imap">Imagen Personal</option>
                        <option value="imas">Imagen y Sonido</option>
                        <option value="indu">Industrial</option>
                        <option value="icom">Informática y Comunicaciones</option>
                        <option value="ltco">Logística, Transporte y Comercio</option>
                        <option value="mant">Mantenimiento</option>
                        <option value="mamb">Medio Ambiente</option>
                        <option value="quim">Químico</option>
                        <option value="salu">Salud</option>
                        <option value="stho">Servicios Turísticos y Hosteleros</option>
                        <option value="text">Textil</option>
                    </select>
                </div>

                <textarea rows="10" id="descripcion_crear_oferta" class="input_formulario" name="descripcion" placeholder="Descripción"></textarea>

                <div id="container_estudios_experiencia">
                    <select id="select_estudios_crear_oferta" class="input_formulario" name="estudios_minimos">
                        <option value="null" selected>Estudios mínimos</option>
                        <option value="ge">Graduado Escolar</option>
                        <option value="eso">ESO</option>
                        <option value="bac">Bachillerato</option>
                        <option value="gm">Ciclo Formativo Grado Medio</option>
                        <option value="gs">Ciclo Formativo Grado Superior</option>
                        <option value="ea">Enseñanzas artísticas</option>
                        <option value="ed">Enseñanzas deportivas</option>
                        <option value="luni">Licenciatura</option>
                        <option value="muni">Máster</option>
                        <option value="duni">Doctorado</option>
                        <option value="guni">Grado universitario</option>
                    </select>

                    <input type="number" id="experiencia_crear_oferta" class="input_formulario" name="experiencia_minima" placeholder="Experiencia mínima" min="0">
                </div>

                <div id="container_jornada_turno">
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
