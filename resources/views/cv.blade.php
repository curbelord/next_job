@extends('layouts.plantilla_pdf')

@section('title', 'CV')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleCvPdf.css') }}">
@endsection

@section('content')

    <div id="pagina">

        <div id="banda"></div>

        <img  src="{{ asset('build/assets/img/logo_next_job_ext.svg') }}" alt="Logo Next Job" id="logo">

        <h1>
            Nombre Apellidos
        </h1>

        <div id="container_datos_personales">
            <div id="titulo_datos_personales">
                <h3>Datos personales</h3>
            </div>
            <div id="subcontainer_datos_personales">
                <div id="container_foto">
                    <img src="{{ asset('build/assets/img/usuario.svg') }}" alt="Foto de perfil">
                </div>
                <div id="container_datos">
                    <div id="nombre_apellidos">
                        <h4>Nombre Apellidos</h4>
                    </div>
                    <div id="identificador">
                        <p>Identificador</p>
                    </div>
                    <div id="genero">
                        <p>Género</p>
                    </div>
                    <div id="fecha_nacimiento">
                        <p>Fecha de nacimiento</p>
                    </div>
                    <div id="direccion">
                        <p>Dirección</p>
                    </div>
                    <div id="telefono">
                        <p>Teléfono</p>
                    </div>
                    <div id="email">
                        <p>Correo electrónico</p>
                    </div>
                </div>
            </div>
            <div id="subciontainer_estudios">
                <div id="titulo_estudios">
                    <h3>Estudios</h3>
                </div>
                <div id="container_estudios">
                    <div id="estudio">
                        <h4>Estudio</h4>
                    </div>
                    <div id="nivel_estudio">
                        <p>Nivel de estudio</p>
                    </div>
                    <div id="fecha_inicio">
                        <p>Fecha de inicio</p>
                    </div>
                    <div id="fecha_fin">
                        <p>Fecha de fin</p>
                    </div>
                    <div id="centro_estudio">
                        <p>Centro de estudio</p>
                    </div>
                </div>
            </div>
            <div id="subcontainer_experiencia_laboral">
                <div id="titulo_experiencia_laboral">
                    <h3>Experiencia laboral</h3>
                </div>
                <div id="container_experiencia_laboral">
                    <div id="experiencia_laboral">
                        <h4>Experiencia laboral</h4>
                    </div>
                    <div id="fecha_inicio_experiencia">
                        <p>Fecha de inicio</p>
                    </div>
                    <div id="fecha_fin_experiencia">
                        <p>Fecha de fin</p>
                    </div>
                    <div id="empresa">
                        <p>Empresa</p>
                    </div>
                    <div id="descripcion_experiencia">
                        <p>Descripción</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection