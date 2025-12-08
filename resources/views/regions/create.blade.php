@extends('layouts')

@section('content')

<div class="card card-primary card-outline mb-4">

    <div class="card-header">
        <h3 class="card-title">Créer une région</h3>
    </div>

    <form method="POST" action="{{ route('regions.store') }}">
        @csrf

        <div class="card-body">

            <div class="mb-3">
                <label class="form-label">Code</label>
                <input type="text" name="code_region" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom_region" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control">
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Enregistrer</button>

            <a href="{{ route('regions.index') }}" class="btn btn-danger float-end">
                Annuler
            </a>
        </div>

    </form>

</div>

@endsection
