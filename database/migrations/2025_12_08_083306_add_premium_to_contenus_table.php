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
        Schema::table('contenus', function (Blueprint $table) {

            // Ajouter la colonne "premium" si elle n'existe pas déjà
            if (!Schema::hasColumn('contenus', 'premium')) {
                $table->boolean('premium')->default(false)->after('video');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contenus', function (Blueprint $table) {
            if (Schema::hasColumn('contenus', 'premium')) {
                $table->dropColumn('premium');
            }
        });
    }
};
