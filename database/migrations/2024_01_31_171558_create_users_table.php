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
            $table->string('NombreCompleto')->nullable();
            $table->boolean('Habilitado')->nullable();
            $table->string('NombreUsuario')->nullable();
            $table->string('DNI')->nullable();
            $table->string('Telefono');
            $table->string('Direccion');
            $table->string('Imagen');            
            $table->string('Descripcion');
            $table->string('Causa')->nullable();;
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
