@extends('layouts')

@section('content')

<div class="card card-outline mb-4">

    <!-- Header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Ecrire un commentaire</h3>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('commentaires.store') }}">
        @csrf

        <div class="card-body">

            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input
                    type="text"
                    class="form-control"
                    id="auteur"
                    name="auteur"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <input
                    type="text"
                    class="form-control"
                    id="message"
                    name="message"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Type de contenu</label>
                <select name="type_contenu_id" class="form-control" required>
                    <option value="">-- Sélectionner --</option>
                    @foreach($types as $t)
                        <option value="{{ $t->id }}">{{ $t->libelle }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <!-- Footer buttons -->
        <div class="card-footer">

            <a href="{{ route('commentaires.index') }}" class="btn btn-danger float-end">
                Retour
            </a>

            <button type="submit" class="btn btn-primary">
                Enregistrer
            </button>

        </div>

    </form>
</div>

@endsection
