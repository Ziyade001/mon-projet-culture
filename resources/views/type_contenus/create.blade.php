@extends('layouts')

@section('content')

<div class="card card-primary card-outline mb-4">

    <div class="card-header">
        <div class="card-title"><h3>Créer un type de contenu</h3></div>
    </div>

    <form method="POST" action="{{ route('type_contenus.store') }}">
        @csrf

        <div class="card-body">

            <div class="mb-3">
                <label class="form-label">Code_type</label>
                <input type="text" name="code_type" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Libelle</label>
                <input type="text" name="libelle" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control">
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('type_contenus.index') }}" class="btn btn-danger float-end">Annuler</a>
        </div>

    </form>

</div>

@endsection
