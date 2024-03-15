@extends('layouts.plantilla')

@section('title', 'Ver oferta')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleVerOferta.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCurriculumSimplificado.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_datos_top">
            <div id="titulo_datos_procesos">
                <h3>#IDProceso NombreProceso</h3>
            </div>
            <div id="datos_candidatos">
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
                <div id="numero_descartados">
                    <div class="imagen_datos_candidatos"></div>
                    <div id="valor_numero_descartados">
                        <p>Nº descartados</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="container_candidatos">
            <div id="titulo_candidatos">
                <h3>Candidatos</h3>
            </div>
            <div id="container_info_candidatos">
                <div id="subcontainer_info_candidatos">
                    @for ($i = 0; $i < 2; $i++)
                        @component('components.curriculum_simplificado')
                            @slot('nombre')
                                {{ "Nombre de prueba" }}
                            @endslot

                            @slot('edad')
                                {{ "Edad" }}
                            @endslot

                            {{--

                            Si es un currículum ciego, entonces pasar esas variables con estos estilos. Si no, vacías

                            @slot('estiloContainerCandidato')
                                {{ "style=padding:0px;" }}
                            @endslot

                            @slot('estiloCurriculumVisible')
                                {{ "style=display:none;" }}
                            @endslot

                            --}}

                            @slot('estiloContainerCandidato')
                                {{ "" }}
                            @endslot

                            @slot('estiloCurriculumVisible')
                                {{ "" }}
                            @endslot

                            @slot('urlCurriculum')
                                {{ "urlCurriculum" }}
                            @endslot

                            @slot('urlNota')
                                {{ "urlNota" }}
                            @endslot

                            @slot('urlOjo')
                                {{ "urlOjo" }}
                            @endslot
                        @endcomponent
                    @endfor
                </div>
            </div>
        </div>

        <div id="container_descripcion">
            <div id="titulo_descripcion">
                <h3>Descripción del proceso</h3>
            </div>
            <div id="container_info_descripcion">
                <div id="subcontainer_info_descripcion">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat saepe, iure dolorum, ut corporis velit maiores, minus ex nihil repudiandae nemo libero quasi optio mollitia aperiam sunt? Iste, molestias voluptate.Adipisci incidunt aliquam deleniti maxime aspernatur voluptates corrupti nulla perspiciatis explicabo dolor fugiat perferendis, omnis nihil quisquam facilis, accusantium sunt tempora maiores minima assumenda! Quaerat ipsum at consequatur odio libero.</p>
                </div>
            </div>

            <div id="container_datos_bottom">
                <div id="datos_bottom_fila_1">
                    <div id="fecha_publicacion" class="boton_outline_azul">
                        <p>{{ date('d/m/Y', strtotime($oferta->created_at)) }}</p>
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
                        <p>{{ $oferta->turno }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
