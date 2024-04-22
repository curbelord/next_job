@section('title', 'Registro')

@section('style')
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleRegistro.css') }}">
    <script type="module" src="{{ asset('build/assets/js/registro/rol.js') }}"></script>
    <script type="module" src="{{ asset('build/assets/js/registro/ajaxValidacion.js') }}"></script>
@endsection

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="registro">
        @csrf

        <div id="componente_rol">

            <h2>
                ¿Con qué rol te identificas?
            </h2>
            
            <div id="rol">
                <label for="demandante" id="contenedor_demandante">
                    <img src="{{ asset('build/assets/img/candidato.svg') }}" alt="Candidato">
                    <input type="radio" name="rol" id="demandante" value="Demandante">
                    Demandante
                </label>
                <label for="seleccionador" id="contenedor_seleccionador">
                    <img src="{{ asset('build/assets/img/seleccionador.svg') }}" alt="Candidato">
                    <input type="radio" name="rol" id="seleccionador" value="Seleccionador">
                    Seleccionador
                </label>
            </div>

            <button type="button" id="rol_seleccionado">
                Siguiente
            </button>

        </div>

        <div id="formulario_registro">

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

            <x-primary-button>
                {{ __('Registrar') }}
            </x-primary-button>

            <p>
                ¿Tienes una cuenta?
                <a href="{{ url('/inicio-de-sesion') }}">Inicia sesión</a>
            </p>

        </div>

    </form>
</x-guest-layout>
