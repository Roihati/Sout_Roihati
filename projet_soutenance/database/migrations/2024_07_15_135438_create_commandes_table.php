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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('quantite');
        
            $table->string('produit');
            $table->string('status')->default('pending');
            $table->Date('date_livraison');
            #$table->foreignId('produit_id')->references('id');
            #$table->foreignId('id_fournisseur')->references('id');
            #$table->foreignId('id_supermarche')->references('id');
           # $table->foreignId('user_id')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
