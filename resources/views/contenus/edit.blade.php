@extends('layouts')

@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Contenus</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modifier un contenu</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="container-fluid">

 <div class="card card-primary card-outline">

    <!-- HEADER -->
    <div class="card-header">
        <h3 class="card-title">Modifier le contenu : <strong>{{ $contenu->titre }}</strong></h3>
    </div>

    <!-- FORM -->
    <form method="POST" action="{{ route('contenus.update', $contenu) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">

            <!-- TITRE -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Titre</label>
                <input type="text" name="titre" class="form-control" value="{{ $contenu->titre }}" required>
            </div>

            <!-- DESCRIPTION -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $contenu->description }}</textarea>
            </div>

            <!-- TEXTE -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Texte</label>
                <textarea name="texte" class="form-control" rows="4">{{ $contenu->texte }}</textarea>
            </div>

            <!-- PHOTO -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Photo actuelle</label><br>

                @if($contenu->photo)
                    <img src="{{ asset('storage/'.$contenu->photo) }}" 
                         alt="Photo" class="img-thumbnail mb-2" width="180">
                @else
                    <p class="text-muted">Aucune image enregistrée.</p>
                @endif

                <label class="form-label fw-semibold mt-2">Changer la photo</label>
                <input type="file" name="photo" accept="image/*" class="form-control">
            </div>

            <!-- FICHIER -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Fichier actuel</label><br>

                @if($contenu->fichier)
                    <a href="{{ asset('storage/'.$contenu->fichier) }}" target="_blank" class="btn btn-outline-info btn-sm">
                        <i class="bi bi-file-earmark"></i> Télécharger le fichier
                    </a>
                @else
                    <p class="text-muted">Aucun fichier enregistré.</p>
                @endif

                <label class="form-label fw-semibold mt-2">Changer le fichier</label>
                <input type="file" name="fichier" class="form-control">
            </div>

            <!-- VIDEO -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Vidéo actuelle</label><br>

                @if($contenu->video)
                    <video controls width="250" class="rounded mb-2">
                        <source src="{{ asset('storage/'.$contenu->video) }}">
                    </video>
                @else
                    <p class="text-muted">Aucune vidéo enregistrée.</p>
                @endif

                <label class="form-label fw-semibold mt-2">Changer la vidéo</label>
                <input type="file" name="video" accept="video/*" class="form-control">
            </div>

            <!-- TYPE -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Type de contenu</label>
                <select name="type_contenu_id" class="form-control" required>
                    @foreach($types as $t)
                        <option value="{{ $t->id }}" {{ $contenu->type_contenu_id == $t->id ? 'selected' : '' }}>
                            {{ $t->libelle }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- RÉGION -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Région</label>
                <select name="region_id" class="form-control">
                    <option value="">-- Aucune --</option>
                    @foreach($regions as $r)
                        <option value="{{ $r->id }}" 
                            {{ $contenu->region_id == $r->id ? 'selected' : '' }}>
                            {{ $r->nom_region }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('contenus.index') }}" class="btn btn-secondary">
                <i class="bi bi-x-circle me-1"></i> Annuler
            </a>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Mettre à jour
            </button>
        </div>

    </form>
 </div>

</div>
@endsection
