<section>
    <header>
        <h2 class="padding">
            {{ __('Actualizar contraseña') }}
        </h2>

        <p class="padding">
            {{ __('Asegúrate de que estás utilizando una contraseña larga y aleatoria para estar a salvo.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="padding">
            <x-text-input id="update_password_current_password" placeholder="Contraseña actual" name="current_password" type="password" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <div class="padding">
            <x-text-input id="update_password_password" placeholder="Nueva contraseña" name="password" type="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="padding">
            <x-text-input id="update_password_password_confirmation" placeholder="Confirmar contraseña" name="password_confirmation" type="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="padding boton_derecha">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="info-message"
                >{{ __('La nueva contraseña se ha establecido correctamente.') }}</p>
            @endif
        </div>

    </form>
</section>
