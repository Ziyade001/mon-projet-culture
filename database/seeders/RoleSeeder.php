<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'code_role' => 'super_admin',
                'nom_role' => 'Super Administrateur',
                'description' => 'Accès complet à toutes les fonctionnalités du système'
            ],
            [
                'code_role' => 'admin',
                'nom_role' => 'Administrateur',
                'description' => 'Administration du système avec certaines restrictions'
            ],
            [
                'code_role' => 'moderateur',
                'nom_role' => 'Modérateur',
                'description' => 'Gestion des contenus et des utilisateurs'
            ],
            [
                'code_role' => 'editeur',
                'nom_role' => 'Éditeur',
                'description' => 'Création et modification de contenus'
            ],
            [
                'code_role' => 'utilisateur',
                'nom_role' => 'Utilisateur Standard',
                'description' => 'Accès basique aux fonctionnalités publiques'
            ],
            [
                'code_role' => 'premium',
                'nom_role' => 'Utilisateur Premium',
                'description' => 'Accès aux contenus premium et fonctionnalités avancées'
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['code_role' => $role['code_role']], // Condition de recherche
                $role // Données à mettre à jour ou créer
            );
        }

        $this->command->info('Tous les rôles ont été synchronisés.');
    }
}