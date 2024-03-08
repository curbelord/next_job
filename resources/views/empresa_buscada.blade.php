@extends('layouts.plantilla')

@section('title', 'Empresa buscada')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleEmpresaBuscada.css') }}">
@endsection

@section('content')
    <div id="container">
        <div id="container_datos_empresa">
            <div id="container_imagen">
                <div id="imagen_empresa"></div>
            </div>
            <div id="container_texto_datos">
                <div id="nombre_empresa">
                    <h1>Nombre empresa</h1>
                </div>
                <div id="sede_empresa">
                    <p>Sede</p>
                </div>
            </div>
        </div>

        <div id="container_descripcion_empresa">
            <div id="descripcion_empresa">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolorum, exercitationem dolores tempora obcaecati totam corrupti porro quaerat ab, rerum, quod voluptate odit dolorem pariatur eum quos. Iure, saepe reiciendis?
                Ratione repudiandae quo, cupiditate error porro vitae ullam voluptates possimus dolore enim. Harum autem, ratione et commodi ipsam quas molestiae, quibusdam explicabo unde incidunt hic enim amet, atque cumque officia.
                Cum nesciunt numquam rem, incidunt sint neque dolorum iure earum ut commodi blanditiis, ullam officiis, accusamus excepturi sunt exercitationem eveniet veniam deleniti et maiores id. Officia aut officiis reiciendis tempora.
                Voluptate esse labore commodi aperiam! Aut, suscipit delectus maxime et similique doloremque repellendus veniam nam fuga laudantium ad sapiente aperiam architecto quae corporis fugit consequuntur perferendis magnam. Asperiores, eum a!
                Sunt beatae quae repellendus, expedita odio doloribus adipisci maxime unde ipsam numquam. Suscipit, ad. Consequuntur, tenetur nihil ratione aperiam vero totam deleniti! Laborum impedit unde eum, officiis culpa cum pariatur.</p>
            </div>
        </div>
    </div>
@endsection
