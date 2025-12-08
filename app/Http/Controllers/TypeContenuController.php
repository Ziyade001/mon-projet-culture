<?php

namespace App\Http\Controllers;

use App\Models\TypeContenu;
use Illuminate\Http\Request;

class TypeContenuController extends Controller
{
    public function index()
    {
        $typeContenus = TypeContenu::all();
        return view('type_contenus.index', compact('typeContenus'));
    }

    public function create()
    {
        return view('type_contenus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code_type' => 'required',
            'libelle'   => 'required',
        ]);

        TypeContenu::create($request->all());
        return redirect()->route('type_contenus.index');
    }

    public function show(TypeContenu $type_contenu)
    {
        return view('type_contenus.show', compact('type_contenu'));
    }

    public function edit(TypeContenu $type_contenu)
    {
        return view('type_contenus.edit', compact('type_contenu'));
    }

    public function update(Request $request, TypeContenu $type_contenu)
    {
        $request->validate([
            'code_type' => 'required',
            'libelle'   => 'required',
        ]);

        $type_contenu->update($request->all());
        return redirect()->route('type_contenus.index');
    }

    public function destroy(TypeContenu $type_contenu)
    {
        $type_contenu->delete();
        return redirect()->route('type_contenus.index');
    }
}
