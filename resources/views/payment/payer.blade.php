@extends('layouts')

@section('title')
<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0 text-dark fw-bold">Paiement sécurisé</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('contenus.index') }}">Contenus</a></li>
            <li class="breadcrumb-item"><a href="{{ route('contenus.show', $contenu->id) }}">{{ Str::limit($contenu->titre, 20) }}</a></li>
            <li class="breadcrumb-item active">Paiement</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-lock me-2"></i> Paiement sécurisé</h4>
                </div>
                
                <div class="card-body p-4">
                    <div class="row">
                        <!-- Récapitulatif de la commande -->
                        <div class="col-md-6">
                            <div class="card h-100 border">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i> Récapitulatif</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">Article</h6>
                                        <h5 class="fw-bold text-primary">{{ $contenu->titre }}</h5>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">Type de contenu</h6>
                                        <p class="mb-0">{{ $contenu->type->libelle }}</p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">Région</h6>
                                        <p class="mb-0">{{ $contenu->region->nom_region }}</p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">Statut</h6>
                                        <span class="badge bg-warning">PREMIUM</span>
                                    </div>
                                    
                                    <hr>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="text-muted mb-0">Prix</h6>
                                        <h4 class="fw-bold text-primary mb-0">{{ number_format($contenu->prix ?? 100, 0, ',', ' ') }} FCFA</h4>
                                    </div>
                                    
                                    <div class="alert alert-info mt-3">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <small>Le paiement vous donne un accès permanent à ce contenu.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Informations de paiement -->
                        <div class="col-md-6">
                            <div class="card h-100 border">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0"><i class="fas fa-user me-2"></i> Vos informations</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">Nom</h6>
                                        <p class="fw-bold mb-0">{{ auth()->user()->name }}</p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <h6 class="text-muted mb-1">Email</h6>
                                        <p class="fw-bold mb-0">{{ auth()->user()->email }}</p>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-1">Date</h6>
                                        <p class="mb-0">{{ now()->translatedFormat('d F Y à H:i') }}</p>
                                    </div>
                                    
                                    <hr>
                                    
                                    <!-- Logo FedaPay -->
                                    <div class="text-center mb-4">
                                        <img src="https://fedapay.com/images/logo.svg" alt="FedaPay" style="height: 40px;">
                                        <p class="text-muted small mt-2">Paiement sécurisé par FedaPay</p>
                                    </div>
                                    
                                    <!-- Bouton de paiement -->
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary btn-lg w-100 py-3" id="payButton" onclick="processPayment()">
                                            <i class="fas fa-lock me-2"></i>
                                            Payer {{ number_format($contenu->prix ?? 100, 0, ',', ' ') }} FCFA
                                        </button>
                                        
                                        <!-- Chargement -->
                                        <div id="loading" class="text-center mt-3" style="display: none;">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="visually-hidden">Chargement...</span>
                                            </div>
                                            <p class="mt-2">Redirection vers le paiement sécurisé...</p>
                                        </div>
                                        
                                        <!-- Option simulation pour développement -->
                                        @if(app()->environment('local'))
                                        <div class="mt-3">
                                            <a href="{{ route('payment.simulate', $contenu->id) }}" 
                                               class="btn btn-outline-success btn-sm w-100"
                                               onclick="return confirm('Simuler un paiement réussi ?')">
                                                <i class="fas fa-bolt me-1"></i> Simuler un paiement (DEV)
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <div class="alert alert-warning mt-4">
                                        <h6><i class="fas fa-shield-alt me-2"></i> Sécurité garantie</h6>
                                        <small class="mb-0">
                                            Votre paiement est 100% sécurisé. Nous utilisons le cryptage SSL et ne stockons jamais vos informations bancaires.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Étapes du processus -->
                    <div class="mt-4">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="step-card p-3">
                                    <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        1
                                    </div>
                                    <h6 class="mt-2 mb-1">Sélection</h6>
                                    <p class="text-muted small mb-0">Choix du contenu</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="step-card p-3">
                                    <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        2
                                    </div>
                                    <h6 class="mt-2 mb-1">Paiement</h6>
                                    <p class="text-muted small mb-0">Paiement sécurisé</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="step-card p-3">
                                    <div class="step-number bg-light border rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        3
                                    </div>
                                    <h6 class="mt-2 mb-1">Accès</h6>
                                    <p class="text-muted small mb-0">Contenu débloqué</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informations supplémentaires -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h6><i class="fas fa-sync-alt me-2 text-primary"></i> Mode de test</h6>
                                    <p class="small mb-0">
                                        @if(env('FEDAPAY_MODE') === 'sandbox')
                                            <span class="badge bg-warning me-2">SANDBOX</span> 
                                            Vous êtes en mode test. Aucun vrai paiement ne sera effectué.
                                        @else
                                            <span class="badge bg-success me-2">LIVE</span> 
                                            Mode production activé.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h6><i class="fas fa-question-circle me-2 text-primary"></i> Support</h6>
                                    <p class="small mb-0">
                                        Besoin d'aide ? Contactez notre support à 
                                        <a href="mailto:support@example.com">support@example.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-light py-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <a href="{{ route('contenus.show', $contenu->id) }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Retour à l'article
                            </a>
                        </div>
                        <div class="col-md-6 text-end">
                            <small class="text-muted">
                                <i class="fas fa-lock me-1"></i> Sécurisé par SSL • 
                                <i class="fas fa-shield-alt me-1 ms-2"></i> Données cryptées
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Méthodes de paiement acceptées -->
            <div class="text-center mt-4">
                <p class="text-muted mb-2">Méthodes de paiement acceptées</p>
                <div class="d-flex justify-content-center gap-3">
                    <i class="fab fa-cc-mastercard fa-2x text-dark"></i>
                    <i class="fab fa-cc-visa fa-2x text-dark"></i>
                    <i class="fas fa-mobile-alt fa-2x text-dark"></i> <!-- Mobile money -->
                    <i class="fas fa-wallet fa-2x text-dark"></i> <!-- Portefeuille électronique -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border-radius: 12px;
        overflow: hidden;
    }
    
    .step-card {
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        transition: transform 0.3s;
    }
    
    .step-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .step-number {
        font-weight: bold;
        font-size: 1.1rem;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        transition: all 0.3s;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    
    .card-header {
        border-bottom: 2px solid rgba(0,0,0,0.05);
    }
</style>
@endpush

@push('scripts')
<script>
    function processPayment() {
        // Afficher le chargement
        document.getElementById('payButton').style.display = 'none';
        document.getElementById('loading').style.display = 'block';
        
        // Redirection vers le paiement FedaPay via AJAX pour plus de contrôle
        fetch('{{ route("payment.payer", $contenu->id) }}')
            .then(response => {
                if (response.redirected) {
                    window.location.href = response.url;
                } else {
                    return response.json();
                }
            })
            .then(data => {
                if (data && data.redirect_url) {
                    window.location.href = data.redirect_url;
                } else {
                    throw new Error('Pas d\'URL de redirection reçue');
                }
            })
            .catch(error => {
                // Réafficher le bouton en cas d'erreur
                document.getElementById('payButton').style.display = 'block';
                document.getElementById('loading').style.display = 'none';
                
                // Afficher un message d'erreur
                alert('Une erreur est survenue : ' + error.message + '\n\nVeuillez réessayer ou contacter le support.');
            });
    }
    
    // Auto-redirection après 10 secondes (optionnel)
    window.addEventListener('DOMContentLoaded', (event) => {
        let timer = 30; // secondes
        const countdownElement = document.createElement('div');
        countdownElement.className = 'text-center mt-3';
        countdownElement.innerHTML = `
            <p class="text-muted small">
                Redirection automatique dans <span id="countdown">${timer}</span> secondes
            </p>
        `;
        document.querySelector('.text-center').appendChild(countdownElement);
        
        const countdownInterval = setInterval(() => {
            timer--;
            document.getElementById('countdown').textContent = timer;
            
            if (timer <= 0) {
                clearInterval(countdownInterval);
                processPayment();
            }
        }, 1000);
    });
</script>
@endpush