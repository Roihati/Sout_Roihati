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
        Schema::create('users', function (Blueprint $table) {
         $table->id();
        $table->string('name')->nuillable();
        #$table->string('phone')->nullable()->change();
        $table->string('phone')->nuillable();
        $table->string('address')->nuillable();
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        

       $table->unsignedBigInteger('role_id')->default(1); // Définir un `role_id` par défaut, remplacez $defaultRoleId par l'ID du rôle "client
       #$table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
       # $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        $table->rememberToken();
        $table->timestamps();
    
     
        
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
