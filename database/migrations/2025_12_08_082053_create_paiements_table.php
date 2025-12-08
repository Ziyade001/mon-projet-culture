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
        Schema::create('paiements', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('utilisateur_id');
    $table->unsignedBigInteger('contenu_id');
    $table->string('transaction_id')->nullable();
    $table->string('statut')->default('pending');  // pending, paid, failed
    $table->timestamps();

    $table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
    $table->foreign('contenu_id')->references('id')->on('contenus');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
