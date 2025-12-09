<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Affiche la vue d'inscription.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Traite la demande d'inscription.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:utilisateurs,email'
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Création de l'utilisateur avec seulement les champs d'inscription
        $user = Utilisateur::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // On laisse tout le reste à NULL
        ]);

        event(new Registered($user));

        // Connexion automatique
        Auth::login($user);

        // Redirection vers dashboard (ou la page de ton choix)
        return redirect()->route('login');
    }
}
