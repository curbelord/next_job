@section('title', 'Inicio de sesión')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleInicio_de_sesion.css') }}">
    <script type="module" src="{{ asset('build/assets/js/registro/ajaxValidacionLogin.js') }}"></script>
@endsection

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="login">
        @csrf
   
        <h2>Inicio de sesión</h2>

        <x-text-input id="email" type="email" placeholder="Correo electrónico" name="email" :value="old('email')" autofocus autocomplete="username" />
        <p class="error-mensaje">El campo "Correo electrónico" no puede estar vacío.</p>

        <x-text-input id="password"
                        type="password"
                        name="password"
                        placeholder="Contraseña"
                        autocomplete="current-password" />
        <p class="error-mensaje">El campo "Confirmar contraseña" no puede estar vacío.</p>

        <button type="button" id="boton_iniciar_sesion">
            Iniciar sesión
        </button>

        <p>
            ¿No tienes una cuenta?
            <a href="{{ route('register') }}">Registrar</a>
        </p>

    </form>
</x-guest-layout>