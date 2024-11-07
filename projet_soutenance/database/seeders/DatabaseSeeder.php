<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer une liste d'utilisateurs avec leurs rôles respectifs
        $users = [
            [
                'email' => 'client@example.com',
                'name' => 'Client',
                'role' => 'client',
                'phone' => '1234567890'
            ],
            [
                'email' => 'admin@example.com',
                'name' => 'Admin',
                'role' => 'admin',
                'phone' => '0987654321'
            ],
            [
                'email' => 'fournisseur@example.com',
                'name' => 'Fournisseur',
                'role' => 'fournisseur',
                'phone' => '1231231234'
            ],
            [
                'email' => 'supermarche@example.com',
                'name' => 'Supermarché',
                'role' => 'supermarche',
                'phone' => '9876543210'
            ]
        ];

        // Boucle à travers chaque utilisateur pour les créer et leur assigner un rôle
        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => bcrypt('password'), // Mot de passe par défaut
                    'phone' => $userData['phone'] // Ajoutez le numéro de téléphone
                ]
            );

            // Assigner le rôle à l'utilisateur
            $user->assignRole($userData['role']);
        }
    }
}