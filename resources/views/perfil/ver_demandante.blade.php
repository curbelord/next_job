@extends('layouts.plantilla')

@section('title', 'Ver perfil')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleVerDemandante.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleExperienciaLaboral.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleFormacion.css') }}">
    <script type="module" src="{{ asset('build/assets/js/perfil/perfil.js') }}"></script>
@endsection

@section('content')
    <div id="container">

        @if(session('mensajeFormacionEliminada'))
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                });
                Toast.fire({
                    icon: "success",
                    title: "¡Se ha eliminado la formación correctamente!"
                });
            </script>
        @elseif(session('mensajeExperienciaEliminada'))
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                });
                Toast.fire({
                    icon: "success",
                    title: "¡Se ha eliminado la experiencia correctamente!"
                });
            </script>
        @endif

        @if (Auth::user()->hasRole('demandante'))
            <div id="container_datos_top">
        @else
            <div id="container_datos_top" class="width_100">
        @endif
            <div id="container_nombre_cv_iconos">
                @if(Auth::user()->hasRole('demandante'))
                    <div id="nombre_cv">
                        <h3>Datos personales</h3>
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
                            <p>{{ date('d/m/Y', strtotime($usuario->fecha_nacimiento)) }}</p>
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
            @if ($experiencia !== null)
                <div id="container_experiencia_laboral">
                    <div id="titulo_experiencia_laboral">
                        <h3>Experiencia laboral</h3>
                    </div>
                    @foreach ($experiencia as $exp)
                        <form action="{{ route('perfil.ver_demandante.eliminar_experiencia', ['id_cv' => $cv->id, 'id' => $exp->id_experiencia]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div id="subcontainer_experiencia_laboral">
                                @component('components.experiencia_laboral')
                                    @slot('nombreTrabajo')
                                        {{ $exp->nombre }}
                                    @endslot

                                    @slot('nombreEmpresa')
                                        {{ $exp->centro_laboral }}
                                    @endslot

                                    @slot('fechaInicioFin')
                                        {{ date('d/m/Y', strtotime($exp->fecha_inicio)) }} - {{ date('d/m/Y', strtotime($exp->fecha_fin)) }}
                                    @endslot

                                    @slot('rutaEdicion')
                                        {{ "Ruta icono edición" }}
                                    @endslot

                                    @slot('descripcion')
                                        {{ $exp->descripcion }}
                                    @endslot
                                @endcomponent
                            </div>
                        </form>
                    @endforeach

                    <button type="button" class="perfil_anadir">
                        Añadir
                    </button>

                </div>
            @else
                <div id="container_experiencia_laboral">
                    <div id="titulo_seccion_empresa">
                        <h3>Experiencia laboral</h3>
                    </div>
                    <div id="container_datos_empresa">
                        <div id="datos_empresa">
                            <div>
                                No ha añadido ninguna experiencia, ¿quiere añadirla ahora?
                            </div>
                        </div>
                    </div>
                    <button type="button" class="perfil_anadir">
                        Añadir
                    </button>
                </div>
            @endif
            
            @if ($estudios !== null)

                <div id="container_formacion">
                    <div id="titulo_formacion">
                        <h3>Formación</h3>
                    </div>

                    @foreach ($estudios as $est)
                        <form action="{{ route('perfil.ver_demandante.eliminar_estudios', ['id_cv' => $cv->id, 'id' => $est->id_estudio]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div id="subcontainer_formacion">
                                @component('components.formacion')
                                    @slot('nombreFormacion')
                                        {{ $est->nombre }}
                                    @endslot

                                    @slot('nombreCentro')
                                        {{ $est->centro_estudios }}
                                    @endslot

                                    @slot('fechaInicioFin')
                                        {{ date('d/m/Y', strtotime($est->fecha_inicio)) }} - {{ date('d/m/Y', strtotime($est->fecha_fin)) }}
                                    @endslot

                                    @slot('rutaEdicion')
                                        {{ "Ruta icono edición" }}
                                    @endslot
                                @endcomponent
                            </div>
                        </form>
                    @endforeach
                
                    <button type="button" class="perfil_anadir">
                        Añadir
                    </button>
                </div>
            @else
                <div id="container_formacion">
                    <div id="titulo_seccion_empresa">
                        <h3>Formación</h3>
                    </div>
                    <div id="container_datos_empresa">
                        <div id="datos_empresa">
                            <div>
                                No ha añadido ninguna formación, ¿quiere añadirla ahora?
                            </div>
                        </div>
                    </div>
                    <button type="button" class="perfil_anadir">
                        Añadir
                    </button>
                </div>
            @endif

        @else
            @if (isset($empresa))
                <div id="container_seccion_empresa">
                    <div id="titulo_seccion_empresa">
                        <h3>Empresa</h3>
                    </div>
                    <div id="container_datos_empresa">
                        <div id="datos_empresa">
                            <div id="imagen_empresa"></div>
                            <div id="valor_datos_empresa">
                                <div id="nombre_empresa">
                                    <h3>{{ $empresa->nombre }}</h3>
                                </div>
                                <div id="sede_empresa">
                                    <p>{{ $empresa->ubicacion }}</p>
                                </div>
                                <div id="id_empresa">
                                    <p>ID {{ $empresa->id }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div id="container_seccion_empresa">
                    <div id="titulo_seccion_empresa">
                        <h3>Empresa</h3>
                    </div>
                    <div id="container_datos_empresa">
                        <div id="datos_empresa">
                            <div>
                                No tienes ninguna empresa asociada, ¿qué deseas hacer?
                            </div>
                        </div>
                    </div>
                    <div id="container_decision_empresa">
                        <a href="{{ route('auth.registrar_empresa') }}" class="decision_empresa decision_empresa_registrar">Registrar empresa</a>
                        <a href="{{ route('auth.vincular_empresa') }}" class="decision_empresa decision_empresa_vincular">Vincular empresa</a>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection
