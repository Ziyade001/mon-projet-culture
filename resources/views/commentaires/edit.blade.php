@extends('layouts')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Modifier le commentaire : {{ $commentaire->id }}</h3>
    </div>

    <form method="POST" action="{{ route('commentaires.update', $commentaire) }}">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="mb-3">
                <label class="form-label">Auteur</label>
                <input type="text" name="auteur" class="form-control"
                       value="{{ $commentaire->auteur }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control" rows="4">
                    {{ $commentaire->message }}
                </textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Type de contenu</label>
                <select name="type_contenu_id" class="form-control" required>
                    @foreach($types as $t)
                        <option value="{{ $t->id }}" 
                            {{ $commentaire->type_contenu_id == $t->id ? 'selected' : '' }}>
                            {{ $t->libelle }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('commentaires.index') }}" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>

    </form>
</div>

@endsection
