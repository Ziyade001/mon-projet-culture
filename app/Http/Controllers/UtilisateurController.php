<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = Utilisateur::with('role')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('utilisateurs.index', compact('utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('utilisateurs.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'telephone' => 'nullable|string|unique:utilisateurs,telephone',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
            'date_naissance' => 'nullable|date',
            'genre' => 'nullable|in:homme,femme,autre',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Hash du mot de passe
        $validated['password'] = Hash::make($validated['password']);

        // Gestion de la photo de profil
        if ($request->hasFile('photo_profil')) {
            $validated['photo_profil'] = $request->file('photo_profil')->store('profils', 'public');
        }

        // Marquer l'email comme vérifié et l'inscription comme confirmée
        $validated['email_verified_at'] = now();
        $validated['inscription_confirmee_at'] = now();

        Utilisateur::create($validated);

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        $utilisateur->load('role');
        return view('utilisateurs.show', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilisateur $utilisateur)
    {
        $roles = Role::all();
        return view('utilisateurs.edit', compact('utilisateur', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('utilisateurs')->ignore($utilisateur->id)
            ],
            'telephone' => [
                'nullable',
                'string',
                Rule::unique('utilisateurs')->ignore($utilisateur->id)
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
            'date_naissance' => 'nullable|date',
            'genre' => 'nullable|in:homme,femme,autre',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'est_actif' => 'sometimes|boolean',
        ]);

        // Mise à jour du mot de passe si fourni
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        // Gestion de la photo de profil
        if ($request->hasFile('photo_profil')) {
            // Supprimer l'ancienne photo si elle existe
            if ($utilisateur->photo_profil) {
                Storage::disk('public')->delete($utilisateur->photo_profil);
            }
            $validated['photo_profil'] = $request->file('photo_profil')->store('profils', 'public');
        }

        $utilisateur->update($validated);

        return redirect()->route('utilisateurs.show', $utilisateur)
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        // Ne pas permettre la suppression de son propre compte
        if ($utilisateur->id === auth()->id()) {
            return redirect()->back()
                ->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        // Supprimer la photo de profil si elle existe
        if ($utilisateur->photo_profil) {
            Storage::disk('public')->delete($utilisateur->photo_profil);
        }

        $utilisateur->delete();

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }

    /**
     * Toggle le statut actif/inactif
     */
    public function toggleStatus(Utilisateur $utilisateur)
    {
        // Ne pas permettre de désactiver son propre compte
        if ($utilisateur->id === auth()->id()) {
            return redirect()->back()
                ->with('error', 'Vous ne pouvez pas désactiver votre propre compte.');
        }

        $utilisateur->update(['est_actif' => !$utilisateur->est_actif]);

        $status = $utilisateur->est_actif ? 'activé' : 'désactivé';
        return redirect()->back()
            ->with('success', "Utilisateur {$status} avec succès.");
    }
}