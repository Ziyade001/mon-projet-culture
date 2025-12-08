@extends('layouts')

@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Contenus</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Créer un contenu</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="container-fluid">

    <div class="card card-outline mb-4">

        <!-- Header -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Créer un Contenu</h3>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('contenus.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <!-- Titre -->
                <div class="mb-3">
                    <label for="titre" class="form-label fw-semibold">Titre du Contenu</label>
                    <input type="text" id="titre" name="titre" class="form-control" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <input type="hidden" id="description" name="description">
                    <trix-editor input="description" class="trix-content form-control"></trix-editor>
                </div>

                <!-- Texte -->
                <div class="mb-3">
                    <label for="texte" class="form-label fw-semibold">Texte (optionnel)</label>
                    <textarea id="texte" name="texte" rows="3" class="form-control"></textarea>
                </div>

                <!-- Photo -->
                <div class="mb-3">
                    <label for="photo" class="form-label fw-semibold">Photo (image)</label>
                    <input type="file" id="photo" name="photo" accept="image/*" class="form-control">
                    <small class="text-muted">Formats : JPG, PNG, WEBP — Max 4 MB</small>
                </div>

                <!-- Fichier -->
                <div class="mb-3">
                    <label for="fichier" class="form-label fw-semibold">Fichier (optionnel)</label>
                    <input type="file" id="fichier" name="fichier" class="form-control">
                    <small class="text-muted">Tout type de fichier — Max 10 MB</small>
                </div>

                <!-- Vidéo -->
                <div class="mb-3">
                    <label for="video" class="form-label fw-semibold">Vidéo (optionnel)</label>
                    <input type="file" id="video" name="video" accept="video/*" class="form-control">
                    <small class="text-muted">Formats : MP4, MOV, AVI — Max 20 MB</small>
                </div>

                <!-- Type -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Type de contenu</label>
                    <select name="type_contenu_id" class="form-control" required>
                        <option value="">-- Sélectionner --</option>
                        @foreach($types as $t)
                            <option value="{{ $t->id }}">{{ $t->libelle }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Région -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Région (optionnel)</label>
                    <select name="region_id" class="form-control">
                        <option value="">-- Aucune --</option>
                        @foreach($regions as $r)
                            <option value="{{ $r->id }}">{{ $r->nom_region }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- PREMIUM -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Ce contenu est-il premium ?</label>
                    <select name="premium" id="premium" class="form-control" required>
                        <option value="0" @selected(old('premium') == 0)>Non</option>
                        <option value="1" @selected(old('premium') == 1)>Oui</option>
                    </select>
                </div>

            </div>

            <!-- Buttons -->
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('contenus.index') }}" class="btn btn-danger">
                    <i class="bi bi-arrow-left me-1"></i> Retour
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Enregistrer
                </button>
            </div>

        </form>
    </div>
</div>


<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<style>
.trix-content {
    min-height: 200px;
    border: 1px solid #dee2e6 !important;
    border-radius: 0.375rem;
    padding: 0.75rem;
}

.trix-button-group {
    background: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.trix-button {
    border: none !important;
    background: transparent !important;
}

.trix-button:hover {
    background: #e9ecef !important;
}

.trix-button:not(:first-child) {
    border-left: 1px solid #dee2e6 !important;
}

trix-toolbar .trix-button-group {
    margin-bottom: 0;
}
</style>

<script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<script>
document.addEventListener('trix-initialize', function(event) {
    // Personnalisation optionnelle de l'éditeur
    const editor = event.target;
    
    // Désactiver les fichiers (optionnel)
    editor.editor.insertFile = function() {};
});

// Empêcher l'upload de fichiers si vous ne le voulez pas
document.addEventListener('trix-file-accept', function(event) {
    event.preventDefault();
});

// Pré-remplir l'éditeur avec les données existantes si en édition
document.addEventListener('DOMContentLoaded', function() {
    const descriptionValue = @json(old('description', $contenu->description ?? ''));
    if (descriptionValue) {
        const trixEditor = document.querySelector('trix-editor');
        trixEditor.editor.loadHTML(descriptionValue);
    }
});
</script>

@endsection
