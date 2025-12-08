<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_role',
        'nom_role',
        'description'
    ];

    /**
     * Relation avec les utilisateurs
     */
    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }

    /**
     * Scope pour un code de rôle spécifique
     */
    public function scopeByCode($query, $code)
    {
        return $query->where('code_role', $code);
    }

    /**
     * Vérifier si le rôle a des utilisateurs
     */
    public function hasUtilisateurs()
    {
        return $this->utilisateurs()->exists();
    }
}