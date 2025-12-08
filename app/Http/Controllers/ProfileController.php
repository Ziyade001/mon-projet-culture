<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's photo.
     */
    public function updatePhoto(Request $request): RedirectResponse
    {
        $request->validate([
            'photo_profil' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = $request->user();

        if ($request->hasFile('photo_profil')) {
            // Supprimer l'ancienne photo
            if ($user->photo_profil) {
                Storage::disk('public')->delete($user->photo_profil);
            }

            // Sauvegarder la nouvelle photo
            $path = $request->file('photo_profil')->store('profile-photos', 'public');
            $user->photo_profil = $path;
            $user->save();
        }

        return Redirect::route('profile.edit')->with('status', 'profile-photo-updated');
    }

    /**
     * Update the user's personal information.
     */
    public function updatePersonal(Request $request): RedirectResponse
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:utilisateurs,email,' . $request->user()->id],
            'date_naissance' => ['nullable', 'date'],
            'genre' => ['nullable', 'in:homme,femme,autre'],
            'bio' => ['nullable', 'string', 'max:500'],
        ]);

        $user = $request->user();
        $user->fill($request->only(['prenom', 'nom', 'email', 'date_naissance', 'genre', 'bio']));
        
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'personal-information-updated');
    }

    /**
     * Update the user's address.
     */
    public function updateAddress(Request $request): RedirectResponse
    {
        $request->validate([
            'adresse' => ['nullable', 'string', 'max:255'],
            'ville' => ['nullable', 'string', 'max:100'],
            'pays' => ['nullable', 'string', 'max:100'],
            'code_postal' => ['nullable', 'string', 'max:20'],
        ]);

        $request->user()->fill($request->only(['adresse', 'ville', 'pays', 'code_postal']));
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'address-updated');
    }

    /**
     * Update the user's contact information.
     */
    public function updateContact(Request $request): RedirectResponse
    {
        $request->validate([
            'telephone' => ['nullable', 'string', 'max:20', 'unique:utilisateurs,telephone,' . $request->user()->id],
        ]);

        $request->user()->fill($request->only(['telephone']));
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'contact-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}