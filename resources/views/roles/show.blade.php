@extends('layouts')

@section('content')

<div class="card card-outline mb-4">

    <div class="card-header">
        <h3 class="card-title">Détails du role</h3>
    </div>

    <div class="card-body">

       
        <p><strong>Code_role :</strong> {{ $role->code_role }}</p>
        <p><strong>Nom :</strong> {{ $role->nom_role }}</p>
        <p><strong>Description :</strong> {{ $role->description }}</p>

    </div>

    <div class="card-footer">

        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Retour</a>

        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning float-end ms-2">
            Modifier
        </a>

    </div>

</div>

@endsection
