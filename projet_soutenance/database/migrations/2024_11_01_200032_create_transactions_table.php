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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id'); // Clé étrangère vers l'utilisateur
            $table->decimal('amount', 10, 2); // Montant de la transaction
            $table->string('description')->nullable(); // Description de la transaction
            $table->timestamps(); // Crée les colonnes 'created_at' et 'updated_at'
            // Ajoutez une contrainte de clé étrangère si nécessaire
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
