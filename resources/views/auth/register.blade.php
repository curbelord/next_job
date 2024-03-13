@section('title', 'Registro')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleRegistro.css') }}">
@endsection

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="registro">
        @csrf

        <h2>Registro</h2>

        <x-text-input id="name" type="text" name="name" placeholder="Nombre" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />

        <x-text-input id="email" placeholder="Correo electrónico" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <x-text-input id="password" type="password" name="password" placeholder="Contraseña" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <x-text-input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        <x-primary-button>
            {{ __('Registrar') }}
        </x-primary-button>

        <p>
            ¿Tienes una cuenta?
            <a href="{{ url('/inicio-de-sesion') }}">Inicia sesión</a>
        </p>

    </form>
</x-guest-layout>
