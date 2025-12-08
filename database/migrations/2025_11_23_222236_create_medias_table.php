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
      Schema::create('medias', function (Blueprint $table) {
        $table->id();
        $table->string('url');
        $table->string('titre')->nullable();

        // clés étrangères
        $table->foreignId('type_media_id')->constrained('type_medias')->cascadeOnDelete();
        $table->foreignId('contenu_id')->nullable()->constrained('contenus')->nullOnDelete();

        $table->timestamps();
      });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};
