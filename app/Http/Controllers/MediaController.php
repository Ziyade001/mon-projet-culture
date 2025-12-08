<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Contenu;
use App\Models\TypeMedia;
use Illuminate\Http\Request;

class MediaController extends Controller
{

    public function index()
    {
        $medias = Media::with(['type', 'contenu'])->get();
        return view('medias.index', compact('medias'));
    }

    public function create()
    {
        $types = TypeMedia::all();
        $contenus = Contenu::all();
        return view('medias.create', compact('types', 'contenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'url'           => 'required',
            'type_media_id' => 'required',
            'contenu_id'    => 'required',
        ]);

        Media::create($request->all());
        return redirect()->route('medias.index');
    }

    public function show(Media $media)
    {
        return view('medias.show', compact('media'));
    }

    public function edit(Media $media)
    {
        $types = TypeMedia::all();
        $contenus = Contenu::all();
        return view('medias.edit', compact('media', 'types', 'contenus'));
    }

    public function update(Request $request, Media $media)
    {
        $request->validate([
            'url'           => 'required',
            'type_media_id' => 'required',
        ]);

        $media->update($request->all());
        return redirect()->route('medias.index');
    }

    public function destroy(Media $media)
    {
        $media->delete();
        return redirect()->route('medias.index');
    }
}
