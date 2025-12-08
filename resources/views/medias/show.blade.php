@extends('layouts')

@section('content')

<div class="card card-outline">

    <div class="card-header">
        <h3 class="card-title">Détails du media</h3>
    </div>

    <div class="card-body">

        <p><strong>url :</strong><br>
            {{ $media->url }}
        </p>

        <p><strong>Titre :</strong> {{ $media->titre }}</p>

        <p><strong>Type_contenu :</strong> 
            {{ $media->type->libelle ?? '-' }}
        </p>

        <p><strong>Contenu :</strong> 
            {{ $media->contenu->id ?? 'Aucune' }}
        </p>

        

    </div>

    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('medias.index') }}" class="btn btn-secondary">Retour</a>
        <a href="{{ route('medias.edit', $media) }}" class="btn btn-warning">Modifier</a>
    </div>

</div>

@endsection
