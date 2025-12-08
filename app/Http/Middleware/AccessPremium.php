<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Paiement;
use App\Models\Contenu;
use Illuminate\Support\Facades\Auth;

class AccessPremium
{
    /**
     * Vérifie si l'utilisateur a payé avant d'accéder au contenu premium
     */
    public function handle($request, Closure $next)
    {
        $contenu = Contenu::findOrFail($request->id);

        // Si le contenu n'est pas premium → accès libre
        if (!$contenu->premium) {
            return $next($request);
        }

        // Vérifier si l'utilisateur a payé
        $aPaye = Paiement::where('utilisateur_id', Auth::id())
            ->where('contenu_id', $contenu->id)
            ->where('statut', 'paid')
            ->exists();

        if (!$aPaye) {
            return redirect()->route('payment.payer', $contenu->id)
                ->with('error', "Vous devez payer pour accéder à ce contenu.");
        }

        return $next($request);
    }
}
