<div class="menu">
    <nav x-data="{ open: false }">
        <ul>

            <img src="{{ asset('build/assets/img/logo_next_job.svg') }}" alt="Next Job" class="logo logo_no_extendido">
            <img src="{{ asset('build/assets/img/logo_next_job_ext.svg') }}" alt="Next Job" class="logo logo_extendido">

            @auth
                @if (Auth::user()->hasRole('seleccionador'))
                    <li class="empleo"><a href="{{ route('vue.principal_procesos') }}">Publicar oferta</a></li>
                    <li class="empresas"><a href="{{ route('vue.principal_procesos') }}">Procesos</a></li>
                @else
                    <li class="empleo"><a href="{{ route('principal') }}">Empleo</a></li>
                    <li class="empresas"><a href="{{ route('empresas') }}">Empresas</a></li>
                @endif
            @else
                <li class="empleo"><a href="{{ route('principal') }}">Empleo</a></li>
                <li class="empresas"><a href="{{ route('empresas') }}">Empresas</a></li>
            @endauth

            @auth
            <!-- Settings Dropdown -->
            <div class="menu_perfil">
                <x-dropdown class="desplegable_perfil" width="48">
                    <x-slot name="trigger">
                        <button id="boton_menu" class="menu_perfil_boton">
                            <div>

                                {{ Auth::user()->nombre }}
                                <!--img src="{{ asset('build/assets/img/usuario.svg') }}" alt="Usuario" class="usuario"-->

                            </div>

                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                    </x-slot>
                </x-dropdown>
            </div>
            @else
                <li class="acceder"><a href="{{ url('/login') }}">Acceder</a></li>
            @endauth
        </ul>

        <div class="contenedor_vector">
            <div class="vector_borde_gris"></div>
            <div class="vector_borde_azul"></div>
        </div>
    </nav>
</div>
