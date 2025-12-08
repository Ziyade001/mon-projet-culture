@extends('layouts')

@section('content')

<div class="card card-outline mb-4">

    <div class="card-header">
        <h3 class="card-title">Détails du type de media</h3>
    </div>

    <div class="card-body">

       
        <p><strong>Code_type_media :</strong> {{ $typeMedia->code_type_media }}</p>
        <p><strong>Nom :</strong> {{ $typeMedia->libelle }}</p>
        <p><strong>Description :</strong> {{ $typeMedia->description }}</p>

    </div>

    <div class="card-footer">

        <a href="{{ route('type_medias.index') }}" class="btn btn-secondary">Retour</a>

        <a href="{{ route('type_medias.edit', $typeMedia->id) }}" class="btn btn-warning float-end ms-2">
            Modifier
        </a>

    </div>

</div>

@endsection
