<div class="menu">
    <nav>
        <ul>
            <img src="{{ asset('build/assets/img/logo_next_job.svg') }}" alt="Next Job" class="logo logo_no_extendido">
            <img src="{{ asset('build/assets/img/logo_next_job_ext.svg') }}" alt="Next Job" class="logo logo_extendido">


            @auth 
                @if (Auth::user()->hasRole('seleccionador'))
                    <li class="empleo"><a href="{{ route('gestionar.ofertas.crear_oferta.blade.php') }}">Publicar oferta</a></li>
                    <li class="empresas"><a href="{{ route('gestionar.principal_empresa.blade.php') }}">Procesos</a></li>
                @else
                    <li class="empleo"><a href="{{ route('principal') }}">Empleo</a></li>
                    <li class="empresas"><a href="{{ route('empresas') }}">Empresas</a></li>
                @endif
            @else
                <li class="empleo"><a href="{{ route('principal') }}">Empleo</a></li>
                <li class="empresas"><a href="{{ route('empresas') }}">Empresas</a></li>
            @endauth

            
            @if (Route::has('login'))
                @auth
                    <li class="perfil"><a href="{{ url('/dashboard') }}">Perfil</a></li>
                @endauth
            @endif

            @if (Route::has('login'))
                @auth
                    <li class="cerrar_sesion"><a href="{{ url('/logout') }}">Cerrar sesión</a></li>
                @else
                    <li class="acceder"><a href="{{ url('/login') }}">Acceder</a></li>
                @endauth
            @endif

            <i class="fa-solid fa-bars icono_menu"></i>
        </ul>
        <div class="contenedor_vector">
            <div class="vector_borde_gris"></div>
            <div class="vector_borde_azul"></div>
        </div>
    </nav>
</div>
<div class="ocupar_espacio"></div>