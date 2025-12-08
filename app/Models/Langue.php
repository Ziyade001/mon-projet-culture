<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    
    protected $fillable = [
        'code_langues',
        'nom_langues',
        'description',
    ];

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'parlers');
    }
}
