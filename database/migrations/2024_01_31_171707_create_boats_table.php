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
        Schema::create('boats', function (Blueprint $table) {
            $table->id();
            $table->string('Matricula')->nullable();
            $table->string('Manga')->nullable();
            $table->string('Eslora')->nullable();
            $table->string('Origen')->nullable();
            $table->string('Titular')->nullable();            
            $table->string('Imagen')->nullable();
            $table->string('Numero_registro')->nullable();
            $table->string('Datos_Tecnicos')->nullable();
            $table->string('Modelo')->nullable();
            $table->string('Nombre')->nullable();
            $table->string('Causa')->nullable();
            $table->string('Tipo')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boats');
    }
};
