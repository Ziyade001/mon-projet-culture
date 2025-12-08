@extends('layouts')

@section('content')

<!-- En-tête de la page -->
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0 fw-bold">Tableau de Bord</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Tableau de bord</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <!-- Statistiques principales -->
    <div class="row">

        <div class="col-lg-3 col-6">
         <div class="small-box enhanced-box position-relative overflow-hidden rounded-4 shadow-sm">
        
          <div class="inner py-3 px-4">
            <h3 class="fw-bold mb-1">{{ \App\Models\Region::count() }}</h3>
            <p class="mb-0 text-uppercase small text-white-50 letter-spacing">Régions</p>
          </div>

          <!-- Icône en arrière-plan -->
          <div class="icon-bg">
            <i class="bi bi-people"></i>
          </div>

          <a href="{{ route('regions.index') }}" class="small-box-footer text-white fw-semibold">
            Voir plus <i class="bi bi-arrow-right"></i>
          </a>
         </div>
        </div>

        <div class="col-lg-3 col-6">
         <div class="small-box enhanced-box position-relative overflow-hidden rounded-4 shadow-sm">
        
          <div class="inner py-3 px-4">
            <h3 class="fw-bold mb-1">{{ \App\Models\Langue::count() }}</h3>
            <p class="mb-0 text-uppercase small text-white-50 letter-spacing">Langues</p>
          </div>

          <!-- Icône en arrière-plan -->
          <div class="icon-bg">
            <i class="bi bi-translate"></i>
          </div>

          <a href="{{ route('langues.index') }}" class="small-box-footer text-white fw-semibold">
            Voir plus <i class="bi bi-arrow-right"></i>
          </a>
         </div>
        </div>

        <div class="col-lg-3 col-6">
         <div class="small-box enhanced-box position-relative overflow-hidden rounded-4 shadow-sm">
        
          <div class="inner py-3 px-4">
            <h3 class="fw-bold mb-1">{{ \App\Models\Contenu::count() }}</h3>
            <p class="mb-0 text-uppercase small text-white-50 letter-spacing">Contenus</p>
          </div>

          <!-- Icône en arrière-plan -->
          <div class="icon-bg">
            <i class="bi bi-file-text"></i>
          </div>

          <a href="{{ route('contenus.index') }}" class="small-box-footer text-white fw-semibold">
            Voir plus <i class="bi bi-arrow-right"></i>
          </a>
         </div>
        </div>

        <div class="col-lg-3 col-6">
         <div class="small-box enhanced-box position-relative overflow-hidden rounded-4 shadow-sm">
        
          <div class="inner py-3 px-4">
            <h3 class="fw-bold mb-1">{{ \App\Models\Media::count() }}</h3>
            <p class="mb-0 text-uppercase small text-white-50 letter-spacing">Médias</p>
          </div>

          <!-- Icône en arrière-plan -->
          <div class="icon-bg">
            <i class="bi bi-image"></i>
          </div>

          <a href="{{ route('medias.index') }}" class="small-box-footer text-white fw-semibold">
            Voir plus <i class="bi bi-arrow-right"></i>
          </a>
         </div>
        </div>    
    </div>

    <div class="row mt-4">

        <!-- Colonne principale -->
        <div class="col-lg-8">

            <!-- Activité récente -->
 <div class="card mb-4">
    <div class="card-header bg-white border-0 py-3">
        <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title fw-bold mb-0">Activité Récente</h3>
                        <a href="{{ route('contenus.index') }}" class="btn btn-sm btn-outline-primary">
                            Voir tout <i class="bi bi-arrow-right ms-1"></i>
                        </a>
        </div>
    </div>

    <div class="card-body p-0">
        @php
            // Récupération des contenus et médias récents
            $contenus = \App\Models\Contenu::select('id', 'texte as description', 'created_at')
                ->get()
                ->map(function ($item) {
                    $item->type = 'Contenu';
                    return $item;
                });

            $medias = \App\Models\Media::select('id', 'titre as description', 'created_at')
                ->get()
                ->map(function ($item) {
                    $item->type = 'Média';
                    return $item;
                });

            // Fusion + tri + limitation
            $activites = $contenus->merge($medias)
                ->sortByDesc('created_at')
                ->take(6);
        @endphp

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($activites as $item)
                        <tr class="activity-row">
                            <td class="ps-4">
                                @if($item->type === 'Contenu')
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25"><i class="bi bi-file-text me-1"></i>Contenu</span>
                                @else
                                    <span class="badge bg-warning bg-opacity-10 text-black border border-warning border-opacity-25"><i class="bi bi-image me-1"></i>Média</span>
                                @endif
                            </td>

                            <td>
                              <div class="d-flex align-items-center">
                                 <div class="activity-avatar bg-primary bg-opacity-10 text-primary rounded-circle me-3">
                                                    <i class="bi bi-plus-lg"></i>
                                 </div>

                                <div>

                                 @if($item->type === 'Contenu')
                                    <spam class="d-block">Nouveau contenu ajouté</spam>
                                    « <strong>{{ \Illuminate\Support\Str::limit($item->description, 40) }}</strong> »
                                 @else
                                    <spam class="d-block">Nouveau média ajouté</spam>
                                    « <strong>{{ \Illuminate\Support\Str::limit($item->description, 40) }}</strong> »
                                 @endif
                                </div>
                              </div>
                            </td>

                            <td class="text-end pe-4">
                                <small class="text-muted">{{ $item->created_at->format('d/m/Y') }}</small>
                                <br>
                                <small class="text-muted">{{ $item->created_at->format('H:i') }}</small>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-3">
                                Aucune activité récente pour le moment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>


            <!-- Actions rapides -->
            <div class="card">
                <div class="card-header bg-white border-0 py-3">
                    <h3 class="card-title fw-bold mb-0">Actions Rapides</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <a href="{{ route('langues.create') }}" class="action-card card border-0 text-decoration-none h-100">
                                <div class="card-body text-center p-4">
                                    <div class="action-icon bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-3">
                                        <i class="bi bi-plus-circle"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Ajouter une Langue</h6>
                                    <p class="text-muted small mb-0">Nouvelle langue du patrimoine</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="{{ route('langues.index') }}" class="action-card card border-0 text-decoration-none h-100">
                                <div class="card-body text-center p-4">
                                    <div class="action-icon bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-3">
                                        <i class="bi bi-list-ul"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Gérer les Langues</h6>
                                    <p class="text-muted small mb-0">Liste et modification</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="{{ route('contenus.create') }}" class="action-card card border-0 text-decoration-none h-100">
                                <div class="card-body text-center p-4">
                                    <div class="action-icon bg-info bg-opacity-10 text-info rounded-circle mx-auto mb-3">
                                        <i class="bi bi-file-earmark-plus"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Nouveau Contenu</h6>
                                    <p class="text-muted small mb-0">Créer un article</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="{{ route('medias.index') }}" class="action-card card border-0 text-decoration-none h-100">
                                <div class="card-body text-center p-4">
                                    <div class="action-icon bg-warning bg-opacity-10 text-warning rounded-circle mx-auto mb-3">
                                        <i class="bi bi-images"></i>
                                    </div>
                                    <h6 class="fw-bold mb-2">Galerie Médias</h6>
                                    <p class="text-muted small mb-0">Images et documents</p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Colonne droite -->
        <div class="col-lg-4">

            <!-- Carte de bienvenue -->
            <div class="card welcome-card border-0 text-white overflow-hidden mb-4">
                <div class="card-background"></div>
                <div class="card-body position-relative z-1 p-4">
                    <div class="text-center mb-3">
                        <div class="welcome-avatar bg-white bg-opacity-25 rounded-circle p-3 d-inline-flex mb-3">
                            <i class="bi bi-globe-americas display-6"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Bienvenue Administrateur</h4>
                        <p class="mb-3 opacity-75">
                            Gérez votre patrimoine culturel avec simplicité et efficacité
                        </p>
                    </div>
                    <div class="d-grid">
                        <a href="{{ route('profile.edit') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-person-circle me-2"></i>Mon Profil
                        </a>
                    </div>
                </div>
            </div>


            <!-- Statistiques rapides -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h3 class="card-title fw-bold mb-0">Aperçu Global</h3>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-badge bg-primary bg-opacity-10 text-primary rounded p-2 me-3">
                                    <i class="bi bi-translate"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Langues actives</h6>
                                    <small class="text-muted">Patrimoine linguistique</small>
                                </div>
                            </div>
                            <span class="badge bg-primary rounded-pill fs-6">{{ \App\Models\Langue::count() }}</span>
                        </div>

                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-badge bg-success bg-opacity-10 text-success rounded p-2 me-3">
                                    <i class="bi bi-file-text"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Contenus publiés</h6>
                                    <small class="text-muted">Articles culturels</small>
                                </div>
                            </div>
                            <span class="badge bg-success rounded-pill fs-6">{{ \App\Models\Contenu::count() }}</span>
                        </div>

                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-badge bg-warning bg-opacity-10 text-warning rounded p-2 me-3">
                                    <i class="bi bi-image"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Médias enregistrés</h6>
                                    <small class="text-muted">Ressources visuelles</small>
                                </div>
                            </div>
                            <span class="badge bg-warning rounded-pill fs-6">{{ \App\Models\Media::count() }}</span>
                        </div>

                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="stat-badge bg-info bg-opacity-10 text-info rounded p-2 me-3">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Utilisateurs actifs</h6>
                                    <small class="text-muted">Communauté</small>
                                </div>
                            </div>
                            <span class="badge bg-info rounded-pill fs-6">{{ \App\Models\Utilisateur::count() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progression du jour -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h3 class="card-title fw-bold mb-0">Aujourd'hui</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Nouveaux contenus</h6>
                            <small class="text-muted">Ajoutés aujourd'hui</small>
                        </div>
                        <span class="badge bg-primary rounded-pill">
                            {{ \App\Models\Contenu::whereDate('created_at', today())->count() }}
                        </span>
                    </div>
                    <div class="progress mb-4" style="height: 6px;">
                        <div class="progress-bar bg-primary" style="width: {{ min(\App\Models\Contenu::whereDate('created_at', today())->count() * 20, 100) }}%"></div>
                    </div>
                    
                    <div class="text-center">
                        <small class="text-muted">
                            <i class="bi bi-info-circle me-1"></i>
                            Continuez à enrichir le patrimoine culturel
                        </small>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<style>
    .enhanced-box {
        background: linear-gradient(135deg, #0069d9, #004a9f);
        color: #fff;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .enhanced-box:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }

    /* Icône arrière-plan */
    .enhanced-box .icon-bg {
        position: absolute;
        bottom: -10px;
        right: -10px;
        opacity: 0.15;
        font-size: 90px;
        transform: rotate(-15deg);
    }

    .enhanced-box .small-box-footer {
        display: block;
        padding: 10px 0;
        text-align: center;
        background: rgba(0, 0, 0, 0.1);
        text-decoration: none;
        border-top: 1px solid rgba(255, 255, 255, 0.15);
    }

    .letter-spacing {
        letter-spacing: 1px;
    }


    
    /* Styles personnalisés pour le dashboard */
    

    .stat-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .shadow-hover {
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
    }

    .action-card {
        transition: all 0.3s ease;
        border-radius: 12px;
    }

    .action-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .action-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .welcome-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 16px;
        position: relative;
    }

    .welcome-card .card-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    .welcome-avatar {
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255,255,255,0.2);
    }

    .activity-row {
        transition: background-color 0.2s ease;
    }

    .activity-row:hover {
        background-color: #f8f9fa;
    }

    .activity-avatar {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
    }

    .stat-badge {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .table > :not(caption) > * > * {
        padding: 1rem 0.75rem;
    }

    .card {
        border-radius: 12px;
    }

    .btn {
        border-radius: 8px;
        font-weight: 500;
    }

    .badge {
        font-weight: 500;
    }

</style>
@endsection
