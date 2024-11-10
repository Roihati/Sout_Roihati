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
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade'); // Clé étrangère vers Commande
            $table->foreignId('produit_id')->constrained('products')->onDelete('cascade'); // Clé étrangère vers Produit
            $table->integer('quantite'); // Quantité commandée
            $table->decimal('prix_unitaire', 8, 2); // Prix unitaire
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_commandes');
    }
};
