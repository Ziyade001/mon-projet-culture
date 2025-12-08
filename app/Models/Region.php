<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'code_region',
        'nom_region',
        'description',
    ];

    public function contenus()
    {
        return $this->hasMany(Contenu::class);
    }

    // Plusieurs langues parlées dans une région
    public function langues()
    {
        return $this->belongsToMany(Langue::class, 'parlers');
    }
}
