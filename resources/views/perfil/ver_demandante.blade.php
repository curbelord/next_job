@extends('layouts.plantilla')

@section('title', 'Ver perfil')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleVerDemandante.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleExperienciaLaboral.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleFormacion.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_datos_top">
            <div id="container_nombre_cv_iconos">
                <div id="nombre_cv">
                    <h3>CV NombreCV</h3>
                </div>
                <div class="iconos_edicion_eliminacion">
                    <div class="icono_editar">
                        <a href="#"></a>
                    </div>
                    <div class="icono_eliminar">
                        <a href="#"></a>
                    </div>
                </div>
            </div>
            <div id="container_datos_perfil_cvs">
                <div id="datos_perfil">
                    <div id="imagen_usuario"></div>
                    <div id="valor_datos_perfil">
                        <div id="nombre_usuario">
                            <h3>Nombre Apellido Apellido</h3>
                        </div>
                        <div id="fecha_nacimiento">
                            <p>Fecha de nacimiento</p>
                        </div>
                        <div id="direccion_postal">
                            <p>Dirección postal</p>
                        </div>
                        <div id="telefono">
                            <p>Teléfono</p>
                        </div>
                        <div id="correo_electronico">
                            <p>Correo electrónico</p>
                        </div>
                    </div>
                </div>
                <div id="cvs">
                    <div id="titulo_cvs">
                        <h3>CV's</h3>
                    </div>
                    <div id="nombres_cvs">
                        @for($i = 1; $i < 6; $i++)
                            <div id="cv_{{ $i }}" class="cv">
                                <a href="#">CV NombreCV</a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <div id="container_experiencia_laboral">
            <div id="titulo_experiencia_laboral">
                <h3>Experiencia laboral</h3>
            </div>
            <div id="subcontainer_experiencia_laboral">
                @component('components.experiencia_laboral')
                    @slot('nombreTrabajo')
                        {{ "Nombre trabajo" }}
                    @endslot

                    @slot('nombreEmpresa')
                        {{ "Nombre empresa" }}
                    @endslot

                    @slot('fechaInicioFin')
                        {{ "Fecha inicio - Fecha fin" }}
                    @endslot

                    @slot('rutaEdicion')
                        {{ "Ruta icono edición" }}
                    @endslot

                    @slot('rutaEliminacion')
                        {{ "Ruta icono eliminación" }}
                    @endslot

                    @slot('descripcion')
                        {{ "Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum dignissimos illo, adipisci a ratione sit recusandae cumque voluptates? Minus, et nam molestiae cupiditate adipisci sapiente quisquam architecto aperiam aliquid dicta?" }}
                    @endslot
                @endcomponent
            </div>
        </div>

        <div id="container_formacion">
            <div id="titulo_formacion">
                <h3>Formación</h3>
            </div>
            <div id="subcontainer_formacion">
                @component('components.formacion')
                    @slot('nombreFormacion')
                        {{ "Nombre estudio" }}
                    @endslot

                    @slot('nombreCentro')
                        {{ "Nombre centro" }}
                    @endslot

                    @slot('fechaInicioFin')
                        {{ "Fecha inicio - Fecha fin" }}
                    @endslot

                    @slot('rutaEdicion')
                        {{ "Ruta icono edición" }}
                    @endslot

                    @slot('rutaEliminacion')
                        {{ "Ruta icono eliminación" }}
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
