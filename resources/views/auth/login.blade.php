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

        <x-text-input id="password"
                        type="password"
                        name="password"
                        placeholder="Contraseña"
                        autocomplete="current-password" />

        <x-primary-button class="ms-3">
            {{ __('Inicar sesión') }}
        </x-primary-button>

        <p>
            ¿No tienes una cuenta?
            <a href="{{ route('register') }}">Registrar</a>
        </p>

        <!-- Email Address -->
        <!--div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div-->

        <!-- Password -->
        <!--div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div-->

        <!-- Remember Me -->
        <!--div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
            </label>
        </div-->

        <!--div class="flex items-center justify-end mt-4"-->
        @if (Route::has('password.request'))
                <!--a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{-- route('password.request') --}}"-->
                    {{-- __('¿Olvidaste la contraseña?') --}}
                <!--/a-->
            @endif

            <!--x-primary-button class="ms-3"-->
                {{-- __('ENTRAR') --}}
            <!--/x-primary-button-->
        <!--/div-->

    </form>
</x-guest-layout>