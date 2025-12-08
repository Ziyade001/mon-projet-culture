<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parler extends Model
{
    protected $table = 'parlers';

    protected $fillable = [
        'langue_id',
        'region_id',
    ];

    public function langue()
    {
        return $this->belongsTo(Langue::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
