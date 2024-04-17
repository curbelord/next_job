<section>
    <header>
        <h2 class="padding">
            {{ __('Información del perfil') }}
        </h2>

        <p class="padding">
            {{ __("Actualiza la información de tu dirección de correo y de tu perfil.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="padding">
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" :value="old('nombre', $user->nombre)" required autocomplete="nombre" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div class="padding">
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p>
                        {{ __('Tu dirección de correo no está verificada.') }}

                        <button form="send-verification">
                            {{ __('Pulsa aquí para reenviar el email de verificación.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p>
                            {{ __('Un nuevo enlace de verificación se ha enviado a tu dirección de correo.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="padding boton_derecha">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="info-message"
                >{{ __('La información se ha guardado correctamente.') }}</p>
            @endif
        </div>
    </form>
</section>
