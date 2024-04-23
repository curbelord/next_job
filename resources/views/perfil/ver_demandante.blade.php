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
                        <a href="{{ route('perfil.editar_demandante') }}"></a>
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

                @auth 
                    @if (Auth::user()->hasRole('seleccionador'))
                        <div id="container_checkin">
                            <div id="titulo_checkin">
                                <h3>Check-in</h3>
                            </div>
                            <div id="container_boton_checkin">
                                <div id="boton_checkin">
                                    @if ($checkin == false)
                                        <form method="POST" action="{{ route('perfil.checkin') }}">
                                            @csrf
                                            @method('PUT')

                                            <label for="checkin">Pulsa aquí para realizar el check-in</label>
                                            <input type="submit" name="checkin" value="">
                                        </form>
                                    @else
                                        <span>Check-in realizado</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth

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
