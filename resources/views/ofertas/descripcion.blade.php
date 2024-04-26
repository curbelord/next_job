@extends('layouts.plantilla')

@section('title', 'Descripción')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleDescription.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_datos">
            <div class="container_boton_volver">
                <a onclick="goBack(); return false;">Volver</a>
            </div>
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
                        <form method="POST" action="{{ route('ofertas.inscripcion', $oferta) }}">
                            @csrf

                            @if ($inscrito)
                                <input type="button" id="input_boton_inscripcion_inactivo" name="inscripcion" value="Inscrito">
                            @else
                                <input type="submit" id="input_boton_inscripcion" name="inscripcion" value="Inscribirme">
                            @endif

                        </form>
                    </div>
                    <div id="numero_inscritos">
                        <div id="imagen_candidatos_inscritos"></div>
                        <span>{{ $inscripciones }}</span>
                    </div>
                </div>
            </div>
            <div id="container_datos_bottom">
                <div id="datos_bottom_fila_1">
                    <div id="fecha_publicacion" class="boton_outline_azul">
                        <p>{{ date('d/m/Y', strtotime($oferta->created_at)) }}</p>
                    </div>
                    <div id="salario" class="boton_outline_azul">
                        <p>{{ intval($oferta->salario) }}€</p>
                    </div>
                </div>
                <div id="datos_bottom_fila_2">
                    <div id="jornada" class="boton_outline_azul">
                        <p>{{ $oferta->jornada }}</p>
                    </div>
                    <div id="horario" class="boton_outline_azul">
                        <p>{{ $oferta->turno }}</p>
                    </div>
                </div>
            </div>
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
        </div>
    </div>

    <script src="{{ asset('build/assets/js/js_vistas/redireccion_hacia_atras.js') }}"></script>
@endsection
