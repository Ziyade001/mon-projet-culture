@extends('layouts')

@section('content')

<div class="card card-primary card-outline mb-4">

    <div class="card-header">
        <h3 class="card-title">Modifier le role</h3>
    </div>

    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="mb-3">
                <label class="form-label">code_role</label>
                <input type="text" name="code_role" class="form-control"
                       value="{{ $role->code_role }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">nom_role</label>
                <input type="text" name="nom_role" class="form-control"
                       value="{{ $role->nom_role }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control"
                       value="{{ $role->description }}">
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Modifier</button>
            <a href="{{ route('roles.index') }}" class="btn btn-danger float-end">Annuler</a>
        </div>

    </form>

</div>

@endsection
