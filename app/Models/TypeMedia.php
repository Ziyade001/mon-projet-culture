<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMedia extends Model
{
    protected $table = 'type_medias';

    protected $fillable = [
        'code_type_media',
        'libelle',
        'description'
    ];

    public function medias()
    {
        return $this->hasMany(Media::class);
    }
}
