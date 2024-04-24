@extends('layouts.plantilla')

@section('title', 'Ver perfil')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleVerDemandante.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleExperienciaLaboral.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleFormacion.css') }}">
@endsection

@section('content')
    <div id="container">
        @if (Auth::user()->hasRole('demandante'))
            <div id="container_datos_top">
        @else
            <div id="container_datos_top" class="width_100">
        @endif
            <div id="container_nombre_cv_iconos">
                @if(Auth::user()->hasRole('demandante'))
                    <div id="nombre_cv">
                        <h3>CV NombreCV</h3>
                    </div>
                @else
                    <div id="titulo_perfil">
                        <h3>Perfil</h3>
                    </div>
                @endif
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
                            <h3>{{ $usuario->nombre }} {{ $usuario->apellidos }}</h3>
                        </div>
                        <div id="fecha_nacimiento">
                            <p>{{ $usuario->fecha_nacimiento }}</p>
                        </div>
                        <div id="direccion_postal">
                            <p>{{ $usuario->direccion }}</p>
                        </div>
                        <div id="telefono">
                            <p>{{ $usuario->telefono }}</p>
                        </div>
                        <div id="correo_electronico">
                            <p>{{ $usuario->email }}</p>
                        </div>
                    </div>
                </div>

                @auth
                    @if (Auth::user()->hasRole('demandante'))
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

        @if(Auth::user()->hasRole('demandante'))
            <div id="container_experiencia_laboral">
                <div id="titulo_experiencia_laboral">
                    <h3>Experiencia laboral</h3>
                </div>
                @foreach ($experiencia as $exp)
                    <div id="subcontainer_experiencia_laboral">
                        @component('components.experiencia_laboral')
                            @slot('nombreTrabajo')
                                {{ $exp->nombre }}
                            @endslot

                            @slot('nombreEmpresa')
                                {{ $exp->centro_laboral }}
                            @endslot

                            @slot('fechaInicioFin')
                                {{ $exp->fecha_inicio }} - {{ $exp->fecha_fin }}
                            @endslot

                            @slot('rutaEdicion')
                                {{ "Ruta icono edición" }}
                            @endslot

                            @slot('rutaEliminacion')
                                {{ "Ruta icono eliminación" }}
                            @endslot

                            @slot('descripcion')
                                {{ $exp->descripcion }}
                            @endslot
                        @endcomponent
                    </div>
                @endforeach
            </div>

            <div id="container_formacion">
                <div id="titulo_formacion">
                    <h3>Formación</h3>
                </div>
                @foreach ($estudios as $est)
                <div id="subcontainer_formacion">
                    @component('components.formacion')
                        @slot('nombreFormacion')
                            {{ $est->nombre }}
                        @endslot

                        @slot('nombreCentro')
                            {{ $est->centro_estudios }}
                        @endslot

                        @slot('fechaInicioFin')
                            {{ $est->fecha_inicio }} - {{ $est->fecha_fin }}
                        @endslot

                        @slot('rutaEdicion')
                            {{ "Ruta icono edición" }}
                        @endslot

                        @slot('rutaEliminacion')
                            {{ "Ruta icono eliminación" }}
                        @endslot
                    @endcomponent
                </div>
                @endforeach
            </div>
        @else
            <div id="container_seccion_empresa">
                <div id="titulo_seccion_empresa">
                    <h3>Empresa</h3>
                </div>
                <div id="container_datos_empresa">
                    <div id="datos_empresa">
                        <div id="imagen_empresa"></div>
                        <div id="valor_datos_empresa">
                            <div id="nombre_empresa">
                                <h3>NombreEmpresa</h3>
                            </div>
                            <div id="sede_empresa">
                                <p>Sede</p>
                            </div>
                            <div id="id_empresa">
                                <p>#IDEmpresa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
