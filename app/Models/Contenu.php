<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
    protected $fillable = [
        'titre',
        'texte',
        'description',
        'photo',
        'fichier',
        'video',
        'premium',
        'type_contenu_id',
        'region_id',
    ];

    public function type()
    {
        return $this->belongsTo(TypeContenu::class, 'type_contenu_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function medias()
    {
        return $this->hasMany(Media::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
