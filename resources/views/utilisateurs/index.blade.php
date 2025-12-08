@extends('layouts')

@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Gestion des Utilisateurs</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item active">Utilisateurs</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Header avec bouton d'ajout -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark">Liste des Utilisateurs</h4>
        <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Nouvel Utilisateur
        </a>
    </div>

    <!-- Carte principale -->
    <div class="card shadow border-0">
        <div class="card-body">

            <!-- Tableau des utilisateurs -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Utilisateur</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Rôle</th>
                            <th>Statut</th>
                            <th>Inscription</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($utilisateurs as $utilisateur)
                        <tr>
                            <td>{{ $utilisateur->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($utilisateur->photo_profil)
                                        <img src="{{ asset('storage/' . $utilisateur->photo_profil) }}" 
                                             alt="{{ $utilisateur->prenom }}" 
                                             class="rounded-circle me-3" 
                                             width="40" height="40" style="object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                             style="width: 40px; height: 40px;">
                                            <span class="text-white fw-bold">{{ $utilisateur->initials }}</span>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $utilisateur->nom_complet }}</div>
                                        <small class="text-muted">{{ $utilisateur->genre ?? 'Non spécifié' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>{{ $utilisateur->email }}</div>
                                @if($utilisateur->email_verified_at)
                                    <small class="text-success"><i class="bi bi-check-circle"></i> Vérifié</small>
                                @else
                                    <small class="text-warning"><i class="bi bi-clock"></i> En attente</small>
                                @endif
                            </td>
                            <td>{{ $utilisateur->telephone ?? '-' }}</td>
                            <td>
                                <span class="badge bg-primary">{{ $utilisateur->role->nom_role }}</span>
                            </td>
                            <td>
                                @if($utilisateur->est_actif)
                                    <span class="badge bg-success">Actif</span>
                                @else
                                    <span class="badge bg-danger">Inactif</span>
                                @endif
                            </td>
                            <td>
                                <small class="text-muted">
                                    {{ $utilisateur->created_at->format('d/m/Y') }}
                                </small>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('utilisateurs.show', $utilisateur) }}" 
                                       class="btn btn-sm btn-outline-primary" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('utilisateurs.edit', $utilisateur) }}" 
                                       class="btn btn-sm btn-outline-warning" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @if($utilisateur->id !== auth()->id())
                                        <form action="{{ route('utilisateurs.toggle-status', $utilisateur) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-{{ $utilisateur->est_actif ? 'warning' : 'success' }}" 
                                                    title="{{ $utilisateur->est_actif ? 'Désactiver' : 'Activer' }}">
                                                <i class="bi bi-{{ $utilisateur->est_actif ? 'pause' : 'play' }}"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('utilisateurs.destroy', $utilisateur) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"
                                                    title="Supprimer">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="bi bi-people display-4 d-block mb-2"></i>
                                    Aucun utilisateur trouvé
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($utilisateurs->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    Affichage de {{ $utilisateurs->firstItem() }} à {{ $utilisateurs->lastItem() }} sur {{ $utilisateurs->total() }} utilisateurs
                </div>
                {{ $utilisateurs->links() }}
            </div>
            @endif

        </div>
    </div>

</div>
@endsection