@extends('layout')

@section('title')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0 text-culture-green">Gestion des Utilisateurs</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-header card-header-custom">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-white mb-0">Liste des Utilisateurs</h3>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-person-plus-fill me-1"></i> Nouvel Utilisateur
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 25%">Identité</th>
                                <th style="width: 20%">Contact & Rôle</th>
                                <th style="width: 15%">Statut</th>
                                <th style="width: 15%">Inscription</th>
                                <th style="width: 20%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id_utilisateur }}</td>
                                
                                <td>
                                    <strong>{{ $user->nom_complet }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $user->sexe === 'M' ? 'Masculin' : ($user->sexe === 'F' ? 'Féminin' : 'Autre') }}</small>
                                </td>
                                
                                <td>
                                    <i class="bi bi-envelope me-1"></i> {{ $user->email }}
                                    <br>
                                    <span class="badge bg-secondary">
                                        <i class="bi bi-person-badge-fill me-1"></i> {{ $user->role->nom_role ?? 'N/A' }}
                                    </span>
                                </td>
                                
                                <td>
                                    @php
                                        $badgeClass = match($user->statut) {
                                            'actif' => 'bg-success',
                                            'inactif' => 'bg-warning text-dark',
                                            'suspendu' => 'bg-danger',
                                            default => 'bg-secondary'
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ ucfirst($user->statut) }}</span>
                                    <br>
                                    <small class="text-muted"><i class="bi bi-translate me-1"></i> {{ $user->langue->nom_langue ?? 'N/A' }}</small>
                                </td>
                                
                                <td>
                                    {{ $user->date_inscription ? $user->date_inscription->format('d/m/Y') : $user->created_at->format('d/m/Y') }}
                                    @if($user->date_naissance)
                                        <br><small class="text-muted">Né(e) le {{ $user->date_naissance->format('d/m/Y') }}</small>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('admin.users.show', $user->id_utilisateur) }}"
                                           class="btn btn-info action-btn"
                                           title="Voir">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('admin.users.edit', $user->id_utilisateur) }}"
                                           class="btn btn-warning action-btn"
                                           title="Modifier">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.users.destroy', $user->id_utilisateur) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger action-btn"
                                                    title="Supprimer"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer {{ $user->nom_complet }} ?')">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="bi bi-people display-4 d-block mb-3"></i>
                                        Aucun utilisateur enregistré pour le moment.
                                        <br>
                                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary mt-3">
                                            <i class="bi bi-person-add me-1"></i> Ajouter un utilisateur
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($users->hasPages())
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        Affichage de {{ $users->firstItem() }} à {{ $users->lastItem() }} sur {{ $users->total() }} utilisateurs
                    </div>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection