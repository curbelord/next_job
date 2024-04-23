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
            
            <x-text-input id="nombre" type="text" name="nombre" placeholder="Nombre" :value="old('nombre')" autofocus autocomplete="nombre" />
            <p class="error-mensaje">El campo "Nombre" no puede estar vacío y debe comenzar por mayúsculas.</p>

            <x-text-input id="apellidos" type="apellidos" name="apellidos" placeholder="Apellidos" />
            <p class="error-mensaje">El campo "Apellidos" no puede estar vacío y debe comenzar por mayúsculas.</p>

            <select name="genero" id="genero">
                <option value="" disabled selected>Género</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                <option value="Otro">Otro</option>
            </select>

            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de nacimiento">
            <p class="error-mensaje">El campo "Fecha de nacimiento" no puede estar vacío.</p>

            <input type="text" name="direccion" id="direccion" placeholder="Dirección Postal">

            <input type="text" name="telefono" id="telefono" placeholder="Teléfono">
            <p class="error-mensaje">El campo "Teléfono" no puede estar vacío.</p>

            <x-text-input id="email" placeholder="Correo electrónico" type="email" name="email" :value="old('email')" autocomplete="username" />
            <p class="error-mensaje">El campo "Correo electrónico" no puede estar vacío.</p>

            <x-text-input id="password" type="password" name="password" placeholder="Contraseña" autocomplete="new-password" />
            <p class="error-mensaje">El campo "Contraseña" no puede estar vacío.</p>

            <x-text-input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmar contraseña" autocomplete="new-password" />
            <p class="error-mensaje">El campo "Confirmar contraseña" no puede estar vacío.</p>

            <button type="button" id="boton_registrar">
                Registrar
            </button>

            <p>
                ¿Tienes una cuenta?
                <a href="{{ url('/inicio-de-sesion') }}">Inicia sesión</a>
            </p>

        </div>

    </form>
</x-guest-layout>
