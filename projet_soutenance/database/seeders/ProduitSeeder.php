<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;
use Carbon\Carbon;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Products::create([
            'name' => 'Tomate',
            'price' => 500,
            'stock' => 100, // Remplacez 'Produit stock est banane' par un nombre entier
            'category' => 'category',
            'description' => 'Aucune produit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
