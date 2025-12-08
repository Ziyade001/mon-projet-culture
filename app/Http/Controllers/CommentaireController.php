<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Contenu;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::with('contenu')->get();
        return view('commentaires.index', compact('commentaires'));
    }

    public function create()
    {
        $contenus = Contenu::all();
        return view('commentaires.create', compact('contenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message'    => 'required',
            'contenu_id' => 'required',
        ]);

        Commentaire::create($request->all());
        return redirect()->route('commentaires.index');
    }

    public function show(Commentaire $commentaire)
    {
        return view('commentaires.show', compact('commentaire'));
    }

    public function edit(Commentaire $commentaire)
    {
        $contenus = Contenu::all();
        return view('commentaires.edit', compact('commentaire', 'contenus'));
    }

    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            'message'    => 'required',
            'contenu_id' => 'required',
        ]);

        $commentaire->update($request->all());
        return redirect()->route('commentaires.index');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('commentaires.index');
    }
}
