<?php

namespace App\Http\Controllers;

use FedaPay\FedaPay;
use FedaPay\Transaction;
use App\Models\Contenu;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payer($contenu_id)
    {
        $contenu = Contenu::findOrFail($contenu_id);

        FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
        FedaPay::setEnvironment(env('FEDAPAY_MODE'));

        // Création d'une transaction
        $transaction = Transaction::create([
            'amount' =>  $contenu->prix, // colonne prix de ton contenu
            'currency' => ['iso' => 'XOF'],
            'description' => "Paiement accès à l'article : " . $contenu->titre,
            'callback_url' => route('payment.callback'),
            'customer' => [
                'email' => Auth::user()->email,
                'firstname' => Auth::user()->name,
            ]
        ]);

        // Enregistrer localement
        Paiement::create([
            'utilisateur_id' => Auth::id(),
            'contenu_id' => $contenu->id,
            'transaction_id' => $transaction->id,
        ]);

        // Redirection vers la page de paiement FedaPay
        return redirect($transaction->generateCheckoutUrl());
    }


    public function callback()
    {
        FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
        FedaPay::setEnvironment(env('FEDAPAY_MODE'));

        // Récupération de l'ID dans l'URL
        $id = request('id');

        $transaction = Transaction::retrieve($id);

        if ($transaction->status === 'approved') {

            Paiement::where('transaction_id', $transaction->id)
                ->update(['statut' => 'paid']);

            return redirect()->route('contenu.index')->with('success', "Paiement réussi !");
        }

        return redirect()->route('contenu.index')->with('error', "Paiement échoué !");
    }
}
