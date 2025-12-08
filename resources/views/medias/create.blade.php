@extends('layouts')

@section('content')

<div class="card card-outline mb-4">

    <!-- Header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Créer un Media</h3>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('medias.store') }}">
        @csrf

        <div class="card-body">

            <div class="mb-3">
                <label for="url" class="form-label">url</label>
                <input
                    type="text"
                    class="form-control"
                    id="url"
                    name="url"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="titre" class="form-label">Titre du Media</label>
                <input
                    type="text"
                    class="form-control"
                    id="titre"
                    name="titre"
                    required
                >
            </div>


            <div class="mb-3">
                <label class="form-label">Type de media</label>
                <select name="type_media_id" class="form-control" required>
                    <option value="">-- Sélectionner --</option>
                    @foreach($types as $t)
                        <option value="{{ $t->id }}">{{ $t->libelle }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Contenu</label>
                <select name="contenu_id" class="form-control">
                    <option value="">-- Sélectionner --</option>
                    @foreach($contenus as $c)
                        <option value="{{ $c->id }}">{{ $c->titre }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <!-- Footer buttons -->
        <div class="card-footer">

            <a href="{{ route('medias.index') }}" class="btn btn-danger float-end">
                Retour
            </a>

            <button type="submit" class="btn btn-primary">
                Enregistrer
            </button>

        </div>

    </form>
</div>

@endsection
