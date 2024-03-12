@extends('layouts.plantilla')

@section('title', 'Gestionar procesos')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleGestionarOfertas.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_datos_top">
            <div id="titulo_gestion_procesos">
                <h3>Gestión de procesos</h3>
            </div>
            <div id="datos_candidatos">
                <div id="numero_procesos">
                    <div class="imagen_datos_candidatos"></div>
                    <div id="valor_numero_procesos">
                        <p>Nº procesos</p>
                    </div>
                </div>
                <div id="numero_candidatos">
                    <div class="imagen_datos_candidatos"></div>
                    <div id="valor_numero_candidatos">
                        <p>Nº candidatos</p>
                    </div>
                </div>
                <div id="numero_preseleccionados">
                    <div class="imagen_datos_candidatos"></div>
                    <div id="valor_numero_preseleccionados">
                        <p>Nº preseleccionados</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="container_procesos">
            <div id="subcontainer_procesos">
                <div class="container_proceso">
                    <div class="titulo_proceso">
                        <h3>Título oferta</h3>
                    </div>
                    <div class="datos_mid_proceso">
                        <div class="datos_mid_left_proceso">
                            <div class="centro_trabajo">
                                <p>Centro de trabajo</p>
                            </div>
                            <div class="fecha_publicacion">
                                <p>Fecha publicación</p>
                            </div>
                        </div>
                        <div class="datos_mid_mid_right_proceso">
                            <div class="estado">
                                <select>
                                    <option value="null">Estado</option>
                                    <option value="publicada">Publicada</option>
                                    <option value="plantilla">Plantilla</option>
                                </select>
                            </div>
                            <div class="hipervinculos">
                                <div class="imagen_datos_mid_right">
                                    <a href="#"></a>
                                </div>
                                <div class="imagen_datos_mid_right">
                                    <a href="#"></a>
                                </div>
                                <div class="imagen_datos_mid_right">
                                    <a href="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="container_slider_numeracion">
            <div class="numeracion_slider">
                <span>2</span>
            </div>
            <div class="numeracion_slider">
                <span>3</span>
            </div>
            <div class="numeracion_slider">
                <span>4</span>
            </div>
            <div class="numeracion_slider">
                <span>5</span>
            </div>
        </div>
    </div>
@endsection
