<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langue;

class LanguesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Langue::orderBy('id', 'desc');

    // Recherche texte
    if ($request->filled('search')) {
        $query->where(function($q) use ($request) {
            $q->where('nom_langues', 'like', '%'.$request->search.'%')
              ->orWhere('code_langues', 'like', '%'.$request->search.'%')
              ->orWhere('description', 'like', '%'.$request->search.'%');
        });
    }

    // Filtre avec dropdown statique
    if ($request->filled('langue_id')) {
        $query->where('code_langues', $request->langue_id);
    }

    $langues = $query->paginate(5);

    return view('langues.index', compact('langues'));
}  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('langues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Langue::create($request->all());
        return redirect()->route('langues.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.show', compact('langue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.edit', compact('langue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $langue = Langue::findOrFail($id);
        $langue->update($request->all());

        return redirect()->route('langues.index');
    }

    public function search(Request $request)
    {
    $langues = Langue::where('show', $show)->get();

    return view('langues.search', compact('langues'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!auth()->user()->isAdmin()) {
        return redirect()->back()->with('error', 'Vous n\'avez pas la permission de supprimer.');
    }
        $langue = Langue::findOrFail($id);
        $langue->delete();

        return redirect()->route('langues.index')->with('success', 'Supprimé avec succès.');
    }

    

}
