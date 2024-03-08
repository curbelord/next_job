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
                        <h1>Título oferta</h1>
                    </div>
                    <div id="nombre_empresa">
                        <p>Nombre empresa</p>
                    </div>
                    <div id="centro_trabajo">
                        <p>Centro de trabajo</p>
                    </div>
                </div>
                <div id="container_boton_inscripcion">
                    <div id="boton_inscripcion">
                        <a href="#">Inscribirme</a>
                    </div>
                    <div id="numero_inscritos">
                        <span>Nº inscritos</span>
                    </div>
                </div>
            </div>
            <div id="container_datos_bottom">
                <div id="datos_bottom_fila_1">
                    <div id="fecha_publicacion" class="boton_outline_azul">
                        <p>Fecha de publicación</p>
                    </div>
                    <div id="salario" class="boton_outline_azul">
                        <p>Salario</p>
                    </div>
                </div>
                <div id="datos_bottom_fila_2">
                    <div id="jornada" class="boton_outline_azul">
                        <p>Jornada</p>
                    </div>
                    <div id="horario" class="boton_outline_azul">
                        <p>Horario</p>
                    </div>
                </div>
            </div>

            {{-- PENDIENTE IMPLEMENTAR EL VECTOR AZUL --}}

        </div>

        <div id="container_descripcion">
            <div id="subcontainer_descripcion">
                <div id="titulo_descripcion">
                    <h3>Descripción</h3>
                </div>
                <div id="cuerpo_descripcion">
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut  tellus enim. Donec bibendum libero mollis neque placerat hendrerit.  Donec scelerisque aliquet elit eget mattis. Donec feugiat, orci in  rhoncus lacinia, mauris nisi porta mi, id facilisis justo est nec neque.  Integer eu luctus turpis, ut accumsan ex. Fusce nec velit luctus erat  semper facilisis. Nunc fringilla, enim ut aliquet volutpat, nisi velit  dictum ipsum, quis porttitor sapien odio nec sapien.

                    Phasellus consectetur urna eu diam auctor, sed volutpat tortor  vestibulum. Pellentesque egestas turpis est, vitae interdum nisi iaculis  id. Pellentesque porta quam et quam molestie, nec sagittis erat  lacinia. Vivamus viverra viverra ultricies. Pellentesque dapibus orci  non diam fermentum dignissim. Sed placerat ac erat ut aliquam. Curabitur  hendrerit vulputate tellus, at rhoncus nibh elementum sodales. Integer  egestas enim non leo semper volutpat. Pellentesque luctus odio in  vehicula scelerisque. Quisque enim nulla, ultricies quis ex sit amet,  rutrum ornare ex.

                    Sed scelerisque, ante id maximus interdum, massa mi porttitor turpis,  quis consequat massa risus finibus diam. Nunc non erat fermentum,  feugiat mauris vitae, volutpat mi. Vestibulum ante ipsum primis in  faucibus orci luctus et ultrices posuere cubilia curae; Aenean varius  leo non ullamcorper interdum. Integer orci ante, lobortis placerat  vestibulum tempus.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
