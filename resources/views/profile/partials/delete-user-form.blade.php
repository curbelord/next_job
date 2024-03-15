<section class="space-y-6">
    <header>
        <h2 class="padding">
            {{ __('Eliminar cuenta') }}
        </h2>

        <p class="padding">
            {{ __('Una vez tu cuenta sea eliminada, todos tus datos serán borrados permanentemente. Antes de eliminar tu cuenta, por favor descarga cualquier información que desees mantener.') }}
        </p>
    </header>

    <div class="padding boton_derecha">
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >{{ __('Eliminar cuenta') }}</x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <h2>
                {{ __('¿Estás seguro de que quieres eliminar tu cuenta?') }}
            </h2>

            <p>
                {{ __('Una vez tu cuenta sea eliminada, todos tus datos serán borrados permanentemente. Por favor introduce tu contraseña para confirmar que deseas eliminar permanentemente tu cuenta.') }}
            </p>

            <div>
                <x-input-label for="password" value="{{ __('Contraseña') }}" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="{{ __('Contraseña') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" />
            </div>

            <div>
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button>
                    {{ __('Eliminar cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
