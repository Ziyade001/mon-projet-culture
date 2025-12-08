@extends('layouts')

@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Utilisateurs</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('utilisateurs.index') }}">Utilisateurs</a></li>
                <li class="breadcrumb-item active">Créer</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="container-fluid">

    <div class="card shadow border-0">
        <div class="card-header bg-white">
            <h4 class="card-title mb-0 fw-bold">Créer un nouvel utilisateur</h4>
        </div>

        <form method="POST" action="{{ route('utilisateurs.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">
                    <!-- Informations personnelles -->
                    <div class="col-md-6">
                        <h5 class="fw-semibold text-primary mb-3">Informations personnelles</h5>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                       id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                                @error('prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                       id="nom" name="nom" value="{{ old('nom') }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control @error('telephone') is-invalid @enderror" 
                                   id="telephone" name="telephone" value="{{ old('telephone') }}">
                            @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date_naissance" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" 
                                       id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}">
                                @error('date_naissance')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="genre" class="form-label">Genre</label>
                                <select class="form-select @error('genre') is-invalid @enderror" id="genre" name="genre">
                                    <option value="">Sélectionner...</option>
                                    <option value="homme" {{ old('genre') == 'homme' ? 'selected' : '' }}>Homme</option>
                                    <option value="femme" {{ old('genre') == 'femme' ? 'selected' : '' }}>Femme</option>
                                    <option value="autre" {{ old('genre') == 'autre' ? 'selected' : '' }}>Autre</option>
                                </select>
                                @error('genre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="photo_profil" class="form-label">Photo de profil</label>
                            <input type="file" class="form-control @error('photo_profil') is-invalid @enderror" 
                                   id="photo_profil" name="photo_profil" accept="image/*">
                            @error('photo_profil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Formats: JPG, PNG, GIF - Max: 2MB</small>
                        </div>
                    </div>

                    <!-- Authentification et rôle -->
                    <div class="col-md-6">
                        <h5 class="fw-semibold text-primary mb-3">Authentification & Rôle</h5>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmer le mot de passe <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div class="mb-3">
                            <label for="role_id" class="form-label">Rôle <span class="text-danger">*</span></label>
                            <select class="form-select @error('role_id') is-invalid @enderror" id="role_id" name="role_id" required>
                                <option value="">Sélectionner un rôle...</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ $role->nom_role }} ({{ $role->code_role }})
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Adresse -->
                        <h5 class="fw-semibold text-primary mb-3 mt-4">Adresse</h5>

                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control @error('adresse') is-invalid @enderror" 
                                   id="adresse" name="adresse" value="{{ old('adresse') }}">
                            @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ville" class="form-label">Ville</label>
                                <input type="text" class="form-control @error('ville') is-invalid @enderror" 
                                       id="ville" name="ville" value="{{ old('ville') }}">
                                @error('ville')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="pays" class="form-label">Pays</label>
                                <input type="text" class="form-control @error('pays') is-invalid @enderror" 
                                       id="pays" name="pays" value="{{ old('pays') }}">
                                @error('pays')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="code_postal" class="form-label">Code postal</label>
                            <input type="text" class="form-control @error('code_postal') is-invalid @enderror" 
                                   id="code_postal" name="code_postal" value="{{ old('code_postal') }}">
                            @error('code_postal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" 
                                      id="bio" name="bio" rows="3">{{ old('bio') }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white d-flex justify-content-between">
                <a href="{{ route('utilisateurs.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Retour
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Créer l'utilisateur
                </button>
            </div>
        </form>
    </div>

</div>
@endsection