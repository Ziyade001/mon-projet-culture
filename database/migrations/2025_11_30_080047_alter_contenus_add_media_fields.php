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

            // 🖼️ Ajouter une photo
            if (!Schema::hasColumn('contenus', 'photo')) {
                $table->string('photo')->nullable()->after('texte');
            }

            // 📝 Ajouter une description
            if (!Schema::hasColumn('contenus', 'description')) {
                $table->text('description')->nullable()->after('photo');
            }

            // 📁 Ajouter un champ fichier (upload)
            if (!Schema::hasColumn('contenus', 'fichier')) {
                $table->string('fichier')->nullable()->after('description');
            }

            // 🎥 Ajouter un champ vidéo
            if (!Schema::hasColumn('contenus', 'video')) {
                $table->string('video')->nullable()->after('fichier');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contenus', function (Blueprint $table) {
            if (Schema::hasColumn('contenus', 'photo')) {
                $table->dropColumn('photo');
            }
            if (Schema::hasColumn('contenus', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('contenus', 'fichier')) {
                $table->dropColumn('fichier');
            }
            if (Schema::hasColumn('contenus', 'video')) {
                $table->dropColumn('video');
            }
        });
    }
};
