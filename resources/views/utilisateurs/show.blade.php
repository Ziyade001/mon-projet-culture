@extends('layouts')

@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">{{ $utilisateur->nom_complet }}</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('utilisateurs.index') }}">Utilisateurs</a></li>
                <li class="breadcrumb-item active">{{ $utilisateur->nom_complet }}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <!-- Colonne principale -->
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0 fw-bold">Profil de l'utilisateur</h4>
                        <div class="btn-group">
                            <a href="{{ route('utilisateurs.edit', $utilisateur) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil me-1"></i> Modifier
                            </a>
                            <a href="{{ route('utilisateurs.index') }}" class="btn btn-secondary btn-sm">
                                <i class="bi bi-arrow-left me-1"></i> Retour
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Photo et informations basiques -->
                        <div class="col-md-4 text-center mb-4">
                            @if($utilisateur->photo_profil)
                                <img src="{{ asset('storage/' . $utilisateur->photo_profil) }}" 
                                     alt="{{ $utilisateur->prenom }}" 
                                     class="rounded-circle img-thumbnail mb-3" 
                                     width="150" height="150" style="object-fit: cover;">
                            @else
                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" 
                                     style="width: 150px; height: 150px;">
                                    <span class="text-white fw-bold display-6">{{ $utilisateur->initials }}</span>
                                </div>
                            @endif
                            
                            <h4 class="fw-bold">{{ $utilisateur->nom_complet }}</h4>
                            <p class="text-muted">{{ $utilisateur->role->nom_role }}</p>
                            
                            <div class="mt-3">
                                @if($utilisateur->est_actif)
                                    <span class="badge bg-success fs-6">Compte actif</span>
                                @else
                                    <span class="badge bg-danger fs-6">Compte désactivé</span>
                                @endif
                            </div>
                        </div>

                        <!-- Détails de l'utilisateur -->
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <strong class="text-muted d-block">Email</strong>
                                    <div class="d-flex align-items-center">
                                        <span>{{ $utilisateur->email }}</span>
                                        @if($utilisateur->email_verified_at)
                                            <i class="bi bi-check-circle-fill text-success ms-2" title="Email vérifié"></i>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <strong class="text-muted d-block">Téléphone</strong>
                                    <span>{{ $utilisateur->telephone ?? 'Non renseigné' }}</span>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <strong class="text-muted d-block">Genre</strong>
                                    <span>{{ $utilisateur->genre ? ucfirst($utilisateur->genre) : 'Non spécifié' }}</span>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <strong class="text-muted d-block">Date de naissance</strong>
                                    <span>{{ $utilisateur->date_naissance ? $utilisateur->date_naissance->format('d/m/Y') : 'Non renseignée' }}</span>
                                </div>

                                <div class="col-12 mb-3">
                                    <strong class="text-muted d-block">Adresse</strong>
                                    @if($utilisateur->adresse || $utilisateur->ville || $utilisateur->pays)
                                        <div>
                                            @if($utilisateur->adresse){{ $utilisateur->adresse }}<br>@endif
                                            @if($utilisateur->ville){{ $utilisateur->ville }}@endif
                                            @if($utilisateur->code_postal)({{ $utilisateur->code_postal }})@endif
                                            @if($utilisateur->pays)<br>{{ $utilisateur->pays }}@endif
                                        </div>
                                    @else
                                        <span>Non renseignée</span>
                                    @endif
                                </div>

                                @if($utilisateur->bio)
                                <div class="col-12 mb-3">
                                    <strong class="text-muted d-block">Bio</strong>
                                    <p class="mb-0">{{ $utilisateur->bio }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Statut du compte -->
            <div class="card shadow border-0 mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0 fw-bold">Statut du compte</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong class="text-muted d-block">Rôle</strong>
                        <span class="badge bg-primary fs-6">{{ $utilisateur->role->nom_role }}</span>
                    </div>

                    <div class="mb-3">
                        <strong class="text-muted d-block">Statut</strong>
                        @if($utilisateur->est_actif)
                            <span class="badge bg-success fs-6">Actif</span>
                        @else
                            <span class="badge bg-danger fs-6">Inactif</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <strong class="text-muted d-block">Email vérifié</strong>
                        @if($utilisateur->email_verified_at)
                            <span class="badge bg-success fs-6">Oui</span>
                        @else
                            <span class="badge bg-warning fs-6">Non</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <strong class="text-muted d-block">Inscription confirmée</strong>
                        @if($utilisateur->inscription_confirmee_at)
                            <span class="badge bg-success fs-6">Oui</span>
                        @else
                            <span class="badge bg-warning fs-6">Non</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Activité -->
            <div class="card shadow border-0">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0 fw-bold">Activité</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong class="text-muted d-block">Date d'inscription</strong>
                        <span>{{ $utilisateur->created_at->format('d/m/Y à H:i') }}</span>
                    </div>

                    <div class="mb-3">
                        <strong class="text-muted d-block">Dernière modification</strong>
                        <span>{{ $utilisateur->updated_at->format('d/m/Y à H:i') }}</span>
                    </div>

                    @if($utilisateur->derniere_connexion)
                    <div class="mb-3">
                        <strong class="text-muted d-block">Dernière connexion</strong>
                        <span>{{ $utilisateur->derniere_connexion->format('d/m/Y à H:i') }}</span>
                    </div>
                    @endif

                    @if($utilisateur->inscription_confirmee_at)
                    <div class="mb-3">
                        <strong class="text-muted d-block">Inscription confirmée le</strong>
                        <span>{{ $utilisateur->inscription_confirmee_at->format('d/m/Y à H:i') }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection