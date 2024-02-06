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
            $table->string('Matricula');
            $table->string('Manga');
            $table->string('Eslora');
            $table->string('Origen');
            $table->string('Titular');            
            $table->string('Imagen');
            $table->string('Numero_registro');
            $table->string('Datos_Tecnicos');
            $table->string('Modelo');
            $table->string('Nombre');
            $table->string('Tipo');
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
