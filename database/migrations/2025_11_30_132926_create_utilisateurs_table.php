<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            
            // Informations personnelles
            $table->string('prenom');
            $table->string('nom');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telephone')->nullable()->unique();
            
            // Authentification
            $table->string('password');
            $table->rememberToken();
            
            // Profil
            $table->string('photo_profil')->nullable();
            $table->text('bio')->nullable();
            $table->date('date_naissance')->nullable();
            $table->enum('genre', ['homme', 'femme', 'autre'])->nullable();
            
            // Adresse
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->string('code_postal')->nullable();
            
            // Dates importantes
            $table->timestamp('derniere_connexion')->nullable();
            $table->timestamp('inscription_confirmee_at')->nullable();
            
            // Clé étrangère vers la table roles
            $table->foreignId('role_id')->constrained('roles')->onDelete('restrict');
            
            $table->timestamps();
        });

        // Index pour optimiser les recherches
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};