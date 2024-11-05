<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
       
        // User::factory(10)->create();

        $client= User::firstOrCreate(
            ['email' => 'client@example.com'],
            ['name' => 'client', 'password' => bcrypt('password')]
        );
        $client->assignRole('client');
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );
        $admin->assignRole('admin');
    
        $fournisseur = User::firstOrCreate(
            ['email' => 'fournisseur@example.com'],
            
            [
    'name' => 'Fournisseur', 'password' => bcrypt('password')]);
        
    $fournisseur->assignRole('fournisseur');
    
        $supermarche = User::firstOrCreate(
            ['email' => 'supermarche@example.com'],
            ['name' => 'Supermarché', 'password' => bcrypt('password')]
        );
        $supermarche->assignRole('supermarche');
    }
}
