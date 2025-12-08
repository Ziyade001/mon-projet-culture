@extends('layouts')

@section('content')

<div class="card card-primary card-outline">

    <div class="card-header">
        <h3 class="card-title">Détails du commentaire</h3>
    </div>

    <div class="card-body">

        <p><strong>Auteur :</strong> {{ $commentaire->auteur }}</p>

        <p><strong>Message :</strong><br>
            {{ $commentaire->message }}
        </p>

        <p><strong>Type contenu :</strong> 
            {{ $commentaire->type->libelle ?? '-' }}
        </p>

        

    </div>

    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('commentaires.index') }}" class="btn btn-secondary">Retour</a>
        <a href="{{ route('commentaires.edit', $commentaire) }}" class="btn btn-warning">Modifier</a>
    </div>

</div>

@endsection
