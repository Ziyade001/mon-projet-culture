<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Contact') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mettez à jour vos informations de contact.") }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.contact.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Téléphone -->
        <div>
            <x-input-label for="telephone" :value="__('Téléphone')" />
            <x-text-input id="telephone" name="telephone" type="tel" class="mt-1 block w-full" 
                          :value="old('telephone', auth()->user()->telephone)" />
            <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>

            @if (session('status') === 'contact-updated')
                <p x-data="{ show: true }" 
                   x-show="show" 
                   x-transition 
                   x-init="setTimeout(() => show = false, 2000)" 
                   class="text-sm text-gray-600">
                    {{ __('Informations de contact mises à jour.') }}
                </p>
            @endif
        </div>
    </form>
</section>