@extends('layouts')

@section('content')

<div class="card card-primary card-outline mb-4">

    <div class="card-header">
        <div class="card-title"><h3>Donner un role</h3></div>
    </div>

    <form method="POST" action="{{ route('roles.store') }}">
        @csrf

        <div class="card-body">

            <div class="mb-3">
                <label class="form-label">code_role</label>
                <input type="text" name="code_role" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">nom_role</label>
                <input type="text" name="nom_role" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control">
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('roles.index') }}" class="btn btn-danger float-end">Annuler</a>
        </div>

    </form>

</div>

@endsection
