<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = [
        'auteur',
        'message',
        'contenu_id',
    ];

    public function contenu()
    {
        return $this->belongsTo(Contenu::class);
    }
}
