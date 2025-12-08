@extends('layouts')

@section('content')

<div class="card card-primary card-outline mb-4">

    <div class="card-header">
        <h3 class="card-title">Modifier le type de contenu</h3>
    </div>

    <form method="POST" action="{{ route('type_medias.update', $typeMedia->id) }}">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="mb-3">
                <label class="form-label">Code_type_media</label>
                <input type="text" name="code_type_media" class="form-control"
                       value="{{ $typeMedia->code_type_media }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Libelle</label>
                <input type="text" name="libelle" class="form-control"
                       value="{{ $typeMedia->libelle }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control"
                       value="{{ $typeMedia->description }}">
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Modifier</button>
            <a href="{{ route('type_medias.index') }}" class="btn btn-danger float-end">Annuler</a>
        </div>

    </form>

</div>

@endsection
