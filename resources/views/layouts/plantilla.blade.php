<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('build/assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/css/style.css') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('build/assets/img/logo_next_job.svg') }}" />

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <title>@yield('title')</title>
        @vite('resources/js/app.js')

        @yield('style')

    </head>

    <body>

        <div>
            @include('layouts.navigation')
        </div>

        <div class="container">
            <div id="container_lista_menu">
                <ul id="lista_menu">
                    <li>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>
                    </li>
                    @if (Auth::user() && Auth::user()->hasRole('demandante'))
                        <li>
                            <x-dropdown-link :href="route('gestionar.ofertas.ofertas')">
                                {{ __('Empleo') }}
                            </x-dropdown-link>
                        </li>
                        <li>
                            <x-dropdown-link :href="route('candidaturas')">
                                {{ __('Candidaturas') }}
                            </x-dropdown-link>
                        </li>
                    @elseif (Auth::user() && Auth::user()->hasRole('seleccionador'))
                        <li>
                            <x-dropdown-link :href="route('vue.principal_procesos')">
                                {{ __('Inicio') }}
                            </x-dropdown-link>
                        </li>
                        <li>
                            <x-dropdown-link :href="route('vue.gestionar_ofertas')">
                                {{ __('Gestionar procesos') }}
                            </x-dropdown-link>
                        </li>
                        <li>
                            <x-dropdown-link :href="route('vue.gestionar_autocandidatura')">
                                {{ __('Autocandidaturas') }}
                            </x-dropdown-link>
                        </li>
                    @endif

                    @if(Auth::user())
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
            @yield('content')
            <div>
                @include('components.footer')
            </div>
        </div>



        <script src="{{ asset('build/assets/js/js_vistas/menu_desplegable.js') }}"></script>
    </body>

</html>
