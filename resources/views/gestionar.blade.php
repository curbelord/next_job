@extends('layouts.plantilla')

@section('title', 'Gestionar')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleGestionar.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_bienvenida_seleccionador">
            <h3>Bienvenid@, NombreSeleccionador</h3>
            <p>¿Qué quieres hacer?</p>
        </div>

        <div id="container_seccion_gestion">
            <div id="bloque_gestion_1" class="bloque_gestion">
                <div class="imagen_gestion"></div>
                <div class="texto_gestion">
                    <a href="#">Publicar proceso</a>
                </div>
            </div>
            <div id="bloque_gestion_2" class="bloque_gestion">
                <div class="imagen_gestion"></div>
                <div class="texto_gestion">
                    <a href="#">Gestionar proceso</a>
                </div>
            </div>
            <div id="bloque_gestion_3" class="bloque_gestion">
                <div class="imagen_gestion"></div>
                <div class="texto_gestion">
                    <a href="#">Crear plantilla</a>
                </div>
            </div>
        </div>

        <div id="container_ultimos_procesos">
            <div id="titulo_ultimos_procesos">
                <h3>Últimos procesos</h3>
            </div>
            <div id="subcontainer_ultimos_procesos">
                <div class="container_oferta">
                    <div class="datos_top">
                        <div class="titulo_oferta">
                            <h3>Título oferta</h3>
                        </div>
                        <div class="centro_trabajo_fecha_publicacion">
                            <div class="centro_trabajo">
                                <p>Centro de trabajo</p>
                            </div>
                            <div class="fecha_publicacion">
                                <p>Fecha publicación</p>
                            </div>
                        </div>
                    </div>
                    <div class="datos_bottom">
                        <div class="container_numero_inscritos">
                            <div class="subcontainer_numero_inscritos">
                                <div class="imagen_datos_bottom imagen_inscritos"></div>
                                <div class="valor_numero_inscritos">
                                    <p>Nº inscritos</p>
                                </div>
                            </div>
                        </div>

                        <div class="container_numero_preseleccionados">
                            <div class="subcontainer_numero_preseleccionados">
                                <div class="imagen_datos_bottom imagen_preseleccionados"></div>
                                <div class="valor_numero_preseleccionados">
                                    <p>Nº preseleccionados</p>
                                </div>
                            </div>
                        </div>

                        <div class="container_numero_descartados">
                            <div class="subcontainer_numero_descartados">
                                <div class="imagen_datos_bottom imagen_descartados"></div>
                                <div class="valor_numero_descartados">
                                    <p>Nº descartados</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
