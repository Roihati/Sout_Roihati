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
        Schema::create('favorites', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id'); // ou 'item_id' selon votre cas d'utilisation
            $table->timestamps();

            // Clés étrangères et index
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // ou 'items' selon votre cas d'utilisation

            $table->unique(['user_id', 'product_id']); // Unicité pour éviter les doublons
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }

};