@section('title', 'Registro')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleRegistro.css') }}">
@endsection

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="registro">
        @csrf

        <h2>Registro</h2>

        <x-text-input id="nombre" type="text" name="nombre" placeholder="Nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />

        <x-text-input id="apellidos" type="apellidos" name="apellidos" placeholder="Apellidos" />
        <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />

        <select name="genero" id="genero">
            <option value="" disabled selected>Género</option>
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
            <option value="Otro">Otro</option>
        </select>
        <x-input-error :messages="$errors->get('genero')" class="mt-2" />

        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de nacimiento" require>
        <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />

        <input type="text" name="direccion" id="direccion" placeholder="Dirección Postal">
        <x-input-error :messages="$errors->get('direccion')" class="mt-2" />

        <input type="text" name="telefono" id="telefono" placeholder="Teléfono">
        <x-input-error :messages="$errors->get('telefono')" class="mt-2" />

        <x-text-input id="email" placeholder="Correo electrónico" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <x-text-input id="password" type="password" name="password" placeholder="Contraseña" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <x-text-input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        <p>
            ¿Qué tipo de usuario eres?
        </p>

        <div id="rol">
            <div>
                <label for="demandante"> 
                    <input type="radio" name="rol" id="demandante" value="Demandante">
                    Demandante
                </label>
            </div>
            <div>
                <label for="seleccionador">
                    <input type="radio" name="rol" id="seleccionador" value="Seleccionador">
                    Seleccionador
                </label>
            </div>
            <!--p>
                <input type="radio" name="empresa" id="empresa" value="Empresa">
                <label for="empresa">Empresa</label>
            </p>
            <p>
                <input type="radio" name="administrador" id="administrador" value="Administrador">
                <label for="administrador">Administrador</label>
            </p-->
        </div>

        <x-primary-button>
            {{ __('Registrar') }}
        </x-primary-button>

        <p>
            ¿Tienes una cuenta?
            <a href="{{ url('/inicio-de-sesion') }}">Inicia sesión</a>
        </p>

    </form>
</x-guest-layout>
