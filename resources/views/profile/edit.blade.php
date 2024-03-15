@section('title', 'Perfil')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/stylePerfil.css') }}">
@endsection

<x-app-layout>

    <div class="bloque"></div>

    <div class="perfil">

        <div class="contenedor_opciones">
            <div class="actualizar_cuenta">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="actualizar_contrasena">
                @include('profile.partials.update-password-form')
            </div>

            <div class="eliminar_cuenta">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</x-app-layout>
