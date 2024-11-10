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
        Schema::table('products', function (Blueprint $table) {
           
            
            $table->integer('quantite_disponible')->default(0);
            $table->integer('seuil_reapprovisionnement')->default(10); // ou un autre seuil logique
            $table->string('status')->default('en stock'); // 'en stock', 'rupture'


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            
            $table->dropColumn(['quantite_disponible', 'seuil_reapprovisionnement', 'status']);
        });
    }
};
