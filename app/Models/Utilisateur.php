<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'utilisateurs'; // important si tu ne veux pas "users"

    /**
     * Les attributs assignables en masse.
     */
    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'telephone',
        'password',
        'photo_profil',
        'bio',
        'date_naissance',
        'genre',
        'adresse',
        'ville',
        'pays',
        'code_postal',
        'derniere_connexion',
        'inscription_confirmee_at',
        'role_id'
    ];

    /**
     * Les attributs à cacher dans les tableaux/JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs à convertir.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_naissance' => 'date',
        'derniere_connexion' => 'datetime',
        'inscription_confirmee_at' => 'datetime',
    ];

    /**
     * Relation : un utilisateur appartient à un rôle.
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Accesseur pratique : nom complet
     */
    public function getNomCompletAttribute()
    {
        return $this->prenom . ' ' . $this->nom;
    }

    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }

    public function markEmailAsVerified()
    {
        $this->email_verified_at = now();
        return $this->save();
    }
}
