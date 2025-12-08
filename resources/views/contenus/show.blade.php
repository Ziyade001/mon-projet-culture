@extends('layouts')

@section('title')
<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0 text-dark fw-bold">{{ Str::limit($contenu->titre, 40) }}</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('contenus.index') }}">Contenus</a></li>
            <li class="breadcrumb-item active">{{ Str::limit($contenu->titre, 20) }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

@php
use App\Models\Paiement;

$hasPaid = Paiement::where('utilisateur_id', auth()->id())
                    ->where('contenu_id', $contenu->id)
                    ->where('statut', 'paid')
                    ->exists();

// Vérifier si l'utilisateur est admin (peut débloquer manuellement)
$isAdmin = auth()->user()->role === 'admin'; // Ajustez selon votre logique de rôles
@endphp


<div class="container-fluid">
    <div class="row g-4">

        <!-- ZONE PRINCIPALE -->
        <div class="col-lg-8">

            <div class="card shadow border-0 radius-12">

                {{-- Image de couverture --}}
                @if($contenu->photo)
                <img src="{{ asset('storage/' . $contenu->photo) }}"
                     class="w-100"
                     style="max-height:450px; object-fit:cover;">
                @endif

                <div class="card-body p-4">

                    <h1 class="fw-bold mb-3">{{ $contenu->titre }}</h1>

                    <div class="text-muted mb-4">
                        Publié le {{ $contenu->created_at->translatedFormat('d F Y à H:i') }}
                        @if($contenu->premium)
                            <span class="badge bg-warning ms-2">PREMIUM</span>
                        @endif
                    </div>

                    {{-- ==== DESCRIPTION AVEC ACCÈS PREMIUM ==== --}}
                    @if($contenu->description)

                        @php
                            $desc = strip_tags($contenu->description);
                            $short = Str::limit($desc, 500);
                            $hasMore = strlen($desc) > 500;
                            $isPremiumContent = $contenu->premium;
                            $userCanAccess = $hasPaid || !$isPremiumContent;
                        @endphp

                        <div class="mb-4 p-3 bg-light border rounded">

                            {{-- Texte visible --}}
                            <div style="line-height:1.7;">
                                {!! nl2br(e($short)) !!}
                            </div>

                            {{-- Partie protégée --}}
                            @if($hasMore && !$userCanAccess && $isPremiumContent)

                                <div class="blurred-zone mt-3 p-3"
                                     style="filter:blur(4px); max-height:120px; overflow:hidden;">
                                    {!! nl2br(e(Str::substr($desc, 500))) !!}
                                </div>

                                <div class="mt-3">
                                    {{-- Bouton de paiement via FedaPay --}}
                                    <a href="{{ route('payment.payer', $contenu->id) }}"
                                       class="btn btn-primary w-100 fw-bold py-2">
                                        🔓 Payer pour débloquer le contenu
                                    </a>
                                    
                                    {{-- Option pour admin de débloquer manuellement --}}
                                    @if($isAdmin)
                                        <form action="{{ route('contenus.unlock', $contenu->id) }}" method="POST" class="mt-2">
                                            @csrf
                                            <button type="submit" class="btn btn-success w-100 fw-bold py-2">
                                                👑 Débloquer manuellement (Admin)
                                            </button>
                                        </form>
                                    @endif
                                    
                                    <p class="text-muted small mt-1 text-center">
                                        Paiement sécurisé via FedaPay
                                    </p>
                                </div>

                            @elseif($userCanAccess && $hasMore)
                                {{-- Texte complet débloqué --}}
                                <div class="mt-3" style="white-space:pre-line;">
                                    {!! nl2br(e(Str::substr($desc, 500))) !!}
                                </div>
                            @endif

                        </div>

                    @endif


                    {{-- ==== FICHIER === --}}
                    @if($contenu->fichier)
                    <div class="card p-3 mb-3">
                        <h6 class="fw-bold">Document</h6>
                        
                        @if($contenu->premium && !$hasPaid)
                            <div class="alert alert-warning">
                                <i class="fas fa-lock"></i> Ce document est réservé aux membres premium
                                <br>
                                <a href="{{ route('payment.payer', $contenu->id) }}" class="btn btn-sm btn-primary mt-2">
                                    Débloquer l'accès
                                </a>
                            </div>
                        @else
                            <a href="{{ asset('storage/' . $contenu->fichier) }}" target="_blank"
                               class="btn btn-primary btn-sm mt-2">Télécharger</a>
                        @endif
                    </div>
                    @endif

                    {{-- ==== VIDEO === --}}
                    @if($contenu->video)
                    <div class="card p-3 mb-3">
                        <h6 class="fw-bold">Vidéo</h6>
                        
                        @if($contenu->premium && !$hasPaid)
                            <div class="alert alert-warning">
                                <i class="fas fa-lock"></i> Cette vidéo est réservée aux membres premium
                                <br>
                                <a href="{{ route('payment.payer', $contenu->id) }}" class="btn btn-sm btn-primary mt-2">
                                    Débloquer l'accès
                                </a>
                            </div>
                        @else
                            <div class="ratio ratio-16x9">
                                <video controls controlsList="nodownload">
                                    <source src="{{ asset('storage/' . $contenu->video) }}" type="video/mp4">
                                    Votre navigateur ne supporte pas la lecture de vidéos.
                                </video>
                            </div>
                        @endif
                    </div>
                    @endif

                    {{-- Boutons d'action pour admin --}}
                    @if($isAdmin)
                    <div class="card p-3 mt-3 border-warning">
                        <h6 class="fw-bold text-warning">Actions administrateur</h6>
                        <div class="d-flex gap-2">
                            <a href="{{ route('contenus.edit', $contenu->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('contenus.destroy', $contenu->id) }}" method="POST" 
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>


        <!-- SIDEBAR -->
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header"><strong>Informations</strong></div>

                <div class="card-body">
                    <div class="mb-2"><strong>Type :</strong> {{ $contenu->type->libelle }}</div>
                    <div class="mb-2"><strong>Région :</strong> {{ $contenu->region->nom_region }}</div>
                    <div class="mb-2">
                        <strong>Statut :</strong> 
                        @if($contenu->premium)
                            <span class="badge bg-warning">Premium</span>
                        @else
                            <span class="badge bg-success">Gratuit</span>
                        @endif
                    </div>
                    
                    {{-- Statut de paiement de l'utilisateur --}}
                    @if($contenu->premium && auth()->check())
                        <div class="mb-2">
                            <strong>Votre accès :</strong> 
                            @if($hasPaid)
                                <span class="badge bg-success">Accès payé</span>
                            @else
                                <span class="badge bg-danger">Non payé</span>
                            @endif
                        </div>
                    @endif
                    
                    <div><strong>Création :</strong> {{ $contenu->created_at->format('d/m/Y H:i') }}</div>
                </div>
            </div>

            {{-- Carte de paiement pour contenu premium --}}
            @if($contenu->premium && !$hasPaid)
            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white">
                    <strong><i class="fas fa-crown"></i> Accès Premium</strong>
                </div>
                <div class="card-body text-center">
                    <p class="mb-3">Accédez à tout le contenu de cet article</p>
                    <a href="{{ route('payment.payer', $contenu->id) }}" 
                       class="btn btn-primary w-100 fw-bold py-2">
                        <i class="fas fa-lock-open"></i> Payer maintenant
                    </a>
                    <p class="small text-muted mt-2">
                        <i class="fas fa-shield-alt"></i> Paiement 100% sécurisé
                    </p>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>

@endsection