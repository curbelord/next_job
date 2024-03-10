@extends('layouts.plantilla')

@section('title', 'Descripción')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleDescription.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_datos">
            <div id="container_datos_top">
                <div id="container_imagen">
                    <div id="imagen_empresa"></div>
                </div>
                <div id="container_texto_datos">
                    <div id="titulo_oferta">
                        <h1>{{ $oferta->puesto_trabajo }}</h1>
                    </div>
                    <div id="nombre_empresa">
                        <p>{{ $oferta->seleccionador->empresa->nombre }}</p>
                    </div>
                    <div id="centro_trabajo">
                        <p>{{ $oferta->ubicacion }}</p>
                    </div>
                </div>
                <div id="container_boton_inscripcion">
                    <div id="boton_inscripcion">
                        <a href="#">Inscribirme</a>
                    </div>
                    <div id="numero_inscritos">
                        <span>{{ $inscripciones }}</span>
                    </div>
                </div>
            </div>
            <div id="container_datos_bottom">
                <div id="datos_bottom_fila_1">
                    <div id="fecha_publicacion" class="boton_outline_azul">
                        <p>{{ $oferta->fecha_publicacion }}</p>
                    </div>
                    <div id="salario" class="boton_outline_azul">
                        <p>{{ $oferta->salario }}</p>
                    </div>
                </div>
                <div id="datos_bottom_fila_2">
                    <div id="jornada" class="boton_outline_azul">
                        <p>{{ $oferta->jornada }}</p>
                    </div>
                    <div id="horario" class="boton_outline_azul">
                        <p>{{ $oferta->horario }}</p>
                    </div>
                </div>
            </div>

            {{-- PENDIENTE IMPLEMENTAR EL VECTOR AZUL --}}

        </div>

        <div id="container_descripcion_cuestionario">
            <div id="subcontainer_descripcion">
                <div id="titulo_descripcion">
                    <h3>Descripción</h3>
                </div>
                <div id="cuerpo_descripcion">
                    <p>{{ $oferta->descripcion }}</p>
                </div>
            </div>
            <div id="subcontainer_cuestionario">
                <div id="titulo_cuestionario">
                    <h3>Cuestionario</h3>
                </div>
                <div id="cuerpo_cuestionario">
                    <div id="cuestionario_fila_1">
                        <div id="cantidad_preguntas">
                            <p>Cantidad preguntas</p>
                        </div>
                        <div id="tipo_preguntas">
                            <p>Tipo preguntas</p>
                        </div>
                    </div>
                    <div id="cuestionario_fila_2">
                        <div id="tiempo_aproximado">
                            <p>Tiempo aproximado</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
