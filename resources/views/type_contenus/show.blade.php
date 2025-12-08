@extends('layouts')

@section('content')

<div class="card card-primary card-outline mb-4">

    <div class="card-header">
        <h3 class="card-title">Détails du type de contenu</h3>
    </div>

    <div class="card-body">

       
        <p><strong>Code :</strong> {{ $typeContenu->code_type }}</p>
        <p><strong>Nom :</strong> {{ $typeContenu->libelle }}</p>
        <p><strong>Description :</strong> {{ $typeContenu->description }}</p>

    </div>

    <div class="card-footer">

        <a href="{{ route('type_contenus.index') }}" class="btn btn-secondary">Retour</a>

        <a href="{{ route('type_contenus.edit', $typeContenu->id) }}" class="btn btn-warning float-end ms-2">
            Modifier
        </a>

    </div>

</div>

@endsection
