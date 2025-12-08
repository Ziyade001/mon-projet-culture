<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';
    
    protected $fillable = [
        'url',
        'titre',
        'type_media_id',
        'contenu_id',
    ];

    public function type()
    {
        return $this->belongsTo(TypeMedia::class, 'type_media_id');
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class);
    }
}
