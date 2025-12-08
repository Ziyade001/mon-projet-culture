<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $table = 'paiements';

    protected $fillable = [
        'utilisateur_id',
        'contenu_id',
        'transaction_id',
        'statut',
    ];

    /** Relation avec l'utilisateur */
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }

    /** Relation avec le contenu */
    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'contenu_id');
    }
}
