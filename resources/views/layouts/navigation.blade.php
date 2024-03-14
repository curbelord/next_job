<div class="menu">
    <nav x-data="{ open: false }">
        <ul>
        <!-- Primary Navigation Menu -->
        <!--div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"-->
            <!--div class="flex justify-between h-16"-->
                <!--div class="flex"-->
                    <img src="{{ asset('build/assets/img/logo_next_job.svg') }}" alt="Next Job" class="logo logo_no_extendido">
                    <img src="{{ asset('build/assets/img/logo_next_job_ext.svg') }}" alt="Next Job" class="logo logo_extendido">
                    <li class="empleo"><a href="{{ route('principal') }}">Empleo</a></li>
                    <li class="empresas"><a href="{{ route('empresas') }}">Empresas</a></li>
                    <!-- Logo -->
                    <!--div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div-->

                    <!-- Navigation Links -->
                    <!--div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{-- __('Dashboard') --}}
                        </x-nav-link>
                    </div-->
                <!--/div-->


                <!-- Settings Dropdown -->
                <div class="perfil">
                    <x-dropdown width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <!--div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div-->
            <!--/div-->
        </ul>
        <!--/div-->

        <!-- Responsive Navigation Menu -->
        <!--div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{-- __('Dashboard') --}}
                </x-responsive-nav-link>
            </div-->

            <!-- Responsive Settings Options -->
            <!--div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{-- __('Profile') --}}
                    </x-responsive-nav-link-->

                    <!-- Authentication -->
                    <!--form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{-- __('Log Out') --}}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div-->
        <div class="contenedor_vector">
            <div class="vector_borde_gris"></div>
            <div class="vector_borde_azul"></div>
        </div>
    </nav>
</div>