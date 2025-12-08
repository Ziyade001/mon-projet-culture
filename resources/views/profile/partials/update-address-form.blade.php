<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Adresse') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mettez à jour votre adresse.") }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.address.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Adresse -->
        <div>
            <x-input-label for="adresse" :value="__('Adresse')" />
            <x-text-input id="adresse" name="adresse" type="text" class="mt-1 block w-full" 
                          :value="old('adresse', auth()->user()->adresse)" />
            <x-input-error class="mt-2" :messages="$errors->get('adresse')" />
        </div>

        <!-- Ville -->
        <div>
            <x-input-label for="ville" :value="__('Ville')" />
            <x-text-input id="ville" name="ville" type="text" class="mt-1 block w-full" 
                          :value="old('ville', auth()->user()->ville)" />
            <x-input-error class="mt-2" :messages="$errors->get('ville')" />
        </div>

        <!-- Pays -->
        <div>
            <x-input-label for="pays" :value="__('Pays')" />
            <x-text-input id="pays" name="pays" type="text" class="mt-1 block w-full" 
                          :value="old('pays', auth()->user()->pays)" />
            <x-input-error class="mt-2" :messages="$errors->get('pays')" />
        </div>

        <!-- Code postal -->
        <div>
            <x-input-label for="code_postal" :value="__('Code postal')" />
            <x-text-input id="code_postal" name="code_postal" type="text" class="mt-1 block w-full" 
                          :value="old('code_postal', auth()->user()->code_postal)" />
            <x-input-error class="mt-2" :messages="$errors->get('code_postal')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>

            @if (session('status') === 'address-updated')
                <p x-data="{ show: true }" 
                   x-show="show" 
                   x-transition 
                   x-init="setTimeout(() => show = false, 2000)" 
                   class="text-sm text-gray-600">
                    {{ __('Adresse mise à jour.') }}
                </p>
            @endif
        </div>
    </form>
</section>