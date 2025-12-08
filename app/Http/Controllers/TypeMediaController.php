<?php

namespace App\Http\Controllers;

use App\Models\TypeMedia;
use Illuminate\Http\Request;

class TypeMediaController extends Controller
{
    public function index()
    {
        $typeMedias = TypeMedia::all();
        return view('type_medias.index', compact('typeMedias'));
    }

    public function create()
    {
        return view('type_medias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code_type_media' => 'required',
            'libelle'         => 'required',
        ]);

        TypeMedia::create($request->all());
        return redirect()->route('type_medias.index');
    }

    public function show(TypeMedia $type_media)
    {
        return view('type_medias.show', compact('type_media'));
    }

    public function edit(TypeMedia $type_media)
    {
        return view('type_medias.edit', compact('type_media'));
    }

    public function update(Request $request, TypeMedia $type_media)
    {
        $request->validate([
            'code_type_media' => 'required',
            'libelle'         => 'required',
        ]);

        $type_media->update($request->all());
        return redirect()->route('type_medias.index');
    }

    public function destroy(TypeMedia $type_media)
    {
        $type_media->delete();
        return redirect()->route('type_medias.index');
    }
}
