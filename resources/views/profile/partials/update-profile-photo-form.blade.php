<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Photo de profil') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mettez à jour votre photo de profil.") }}
        </p>
    </header>

    <div class="flex items-center gap-4 mt-6">
        <!-- Photo actuelle -->
        <div class="mr-4">
            @if(auth()->user()->photo_profil)
                <img src="{{ Storage::url(auth()->user()->photo_profil) }}" 
                     alt="Photo de profil" 
                     class="h-20 w-20 rounded-full object-cover">
            @else
                <div class="h-20 w-20 rounded-full bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-2xl">
                        {{ strtoupper(substr(auth()->user()->prenom, 0, 1)) }}{{ strtoupper(substr(auth()->user()->nom, 0, 1)) }}
                    </span>
                </div>
            @endif
        </div>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('patch')

            <div>
                <input type="file" 
                       name="photo_profil" 
                       id="photo_profil"
                       class="block w-full text-sm text-gray-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-50 file:text-blue-700
                              hover:file:bg-blue-100"
                       accept="image/*">
                <x-input-error class="mt-2" :messages="$errors->get('photo_profil')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Mettre à jour') }}</x-primary-button>

                @if (session('status') === 'profile-photo-updated')
                    <p x-data="{ show: true }" 
                       x-show="show" 
                       x-transition 
                       x-init="setTimeout(() => show = false, 2000)" 
                       class="text-sm text-gray-600">
                        {{ __('Photo mise à jour.') }}
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>