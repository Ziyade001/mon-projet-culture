<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Region;
use App\Models\TypeContenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContenuController extends Controller
{
    public function index()
    {
        $contenus = Contenu::with(['type', 'region'])->latest()->get();
        return view('contenus.index', compact('contenus'));
    }

    public function create()
    {
        $regions = Region::all();
        $types = TypeContenu::all();
        return view('contenus.create', compact('regions', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'type_contenu_id' => 'required|exists:type_contenus,id',
            'description' => 'nullable|string',
            'premium' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'fichier' => 'nullable|file|max:10000',
            'video' => 'nullable|mimes:mp4,mov,avi,mkv|max:20000',
        ]);

        $data = $request->except(['photo', 'fichier', 'video']);

        // Upload Photo
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('contenus/photos', 'public');
        }

        // Upload Fichier
        if ($request->hasFile('fichier')) {
            $data['fichier'] = $request->file('fichier')->store('contenus/fichiers', 'public');
        }

        // Upload Vidéo
        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('contenus/videos', 'public');
        }

        Contenu::create($data);

        return redirect()->route('contenus.index')->with('success', 'Contenu créé avec succès.');
    }

    public function show(Contenu $contenu)
    {
        return view('contenus.show', compact('contenu'));
    }

    public function edit(Contenu $contenu)
    {
        $regions = Region::all();
        $types = TypeContenu::all();
        return view('contenus.edit', compact('contenu', 'regions', 'types'));
    }

    public function update(Request $request, Contenu $contenu)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'type_contenu_id' => 'required|exists:type_contenus,id',
            'description' => 'nullable|string',
            'premium' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'fichier' => 'nullable|file|max:10000',
            'video' => 'nullable|mimes:mp4,mov,avi,mkv|max:20000',
        ]);

        $data = $request->except(['photo', 'fichier', 'video']);

        // Update Photo
        if ($request->hasFile('photo')) {
            if ($contenu->photo) Storage::disk('public')->delete($contenu->photo);
            $data['photo'] = $request->file('photo')->store('contenus/photos', 'public');
        }

        // Update Fichier
        if ($request->hasFile('fichier')) {
            if ($contenu->fichier) Storage::disk('public')->delete($contenu->fichier);
            $data['fichier'] = $request->file('fichier')->store('contenus/fichiers', 'public');
        }

        // Update Vidéo
        if ($request->hasFile('video')) {
            if ($contenu->video) Storage::disk('public')->delete($contenu->video);
            $data['video'] = $request->file('video')->store('contenus/videos', 'public');
        }

        $contenu->update($data);

        return redirect()->route('contenus.index')->with('success', 'Contenu mis à jour avec succès.');
    }

    /**
     * Débloquer un contenu après paiement réussi (manuel ou callback FedaPay)
     */
    public function unlock($id)
    {
        $contenu = Contenu::findOrFail($id);

        // 👉 Enregistrer l'accès dans la table paiements
        \App\Models\Paiement::updateOrCreate(
            [
                'utilisateur_id' => auth()->id(),
                'contenu_id' => $contenu->id,
            ],
            [
                'statut' => 'paid',
                'transaction_id' => 'manual_unlock_' . uniqid(), // si nécessaire
            ]
        );

        return redirect()
            ->route('contenus.show', $contenu->id)
            ->with('success', 'Contenu débloqué avec succès.');
    }

    public function destroy(Contenu $contenu)
    {
        if ($contenu->photo) Storage::disk('public')->delete($contenu->photo);
        if ($contenu->fichier) Storage::disk('public')->delete($contenu->fichier);
        if ($contenu->video) Storage::disk('public')->delete($contenu->video);

        $contenu->delete();

        return redirect()->route('contenus.index')->with('success', 'Contenu supprimé avec succès.');
    }
}
