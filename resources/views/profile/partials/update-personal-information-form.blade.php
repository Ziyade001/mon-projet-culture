<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informations personnelles') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mettez à jour vos informations personnelles.") }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.personal.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Prénom -->
        <div>
            <x-input-label for="prenom" :value="__('Prénom')" />
            <x-text-input id="prenom" name="prenom" type="text" class="mt-1 block w-full" 
                          :value="old('prenom', auth()->user()->prenom)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
        </div>

        <!-- Nom -->
        <div>
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" name="nom" type="text" class="mt-1 block w-full" 
                          :value="old('nom', auth()->user()->nom)" required />
            <x-input-error class="mt-2" :messages="$errors->get('nom')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" 
                          :value="old('email', auth()->user()->email)" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Date de naissance -->
        <div>
            <x-input-label for="date_naissance" :value="__('Date de naissance')" />
            <x-text-input id="date_naissance" name="date_naissance" type="date" class="mt-1 block w-full" 
                          :value="old('date_naissance', auth()->user()->date_naissance ? auth()->user()->date_naissance->format('Y-m-d') : '')" />
            <x-input-error class="mt-2" :messages="$errors->get('date_naissance')" />
        </div>

        <!-- Genre -->
        <div>
            <x-input-label for="genre" :value="__('Genre')" />
            <select id="genre" name="genre" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">{{ __('Sélectionnez votre genre') }}</option>
                <option value="homme" {{ old('genre', auth()->user()->genre) == 'homme' ? 'selected' : '' }}>{{ __('Homme') }}</option>
                <option value="femme" {{ old('genre', auth()->user()->genre) == 'femme' ? 'selected' : '' }}>{{ __('Femme') }}</option>
                <option value="autre" {{ old('genre', auth()->user()->genre) == 'autre' ? 'selected' : '' }}>{{ __('Autre') }}</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('genre')" />
        </div>

        <!-- Bio -->
        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea id="bio" name="bio" rows="3" 
                      class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            >{{ old('bio', auth()->user()->bio) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>

            @if (session('status') === 'personal-information-updated')
                <p x-data="{ show: true }" 
                   x-show="show" 
                   x-transition 
                   x-init="setTimeout(() => show = false, 2000)" 
                   class="text-sm text-gray-600">
                    {{ __('Informations mises à jour.') }}
                </p>
            @endif
        </div>
    </form>
</section>