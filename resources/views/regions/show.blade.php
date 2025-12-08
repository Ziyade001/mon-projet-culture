@extends('layouts')

@section('content')

<div class="card card-info card-outline mb-4">
    
    <div class="card-header">
        <h3 class="card-title">Détails de la région</h3>
    </div>

    <div class="card-body">

        <p><strong>Code :</strong> {{ $region->code_region }}</p>

        <p><strong>Nom :</strong> {{ $region->nom_region }}</p>

        <p><strong>Description :</strong> {{ $region->description }}</p>

    </div>

    <div class="card-footer">

        <a href="{{ route('regions.index') }}" class="btn btn-secondary">
            Retour
        </a>

        <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-warning float-end">
            Modifier
        </a>

    </div>

</div>

@endsection
