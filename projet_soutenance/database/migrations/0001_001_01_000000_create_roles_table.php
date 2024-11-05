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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Champ requis
            $table->string('guard_name'); // Champ requis
            $table->string("libele_role");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */


     public function down()
     {
        
        Schema::dropIfExists('roles');
     }
   
    
};
