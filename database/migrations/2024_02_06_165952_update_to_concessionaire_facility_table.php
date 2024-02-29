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
        Schema::table('concessionaire_facilities', function (Blueprint $table) {
            $table->unsignedBigInteger('Concesionario_id');
            $table->foreign('Concesionario_id')->references('Usuario_id')->on('concessionaires')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('Instalacion_id');
            $table->foreign('Instalacion_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->primary(['Concesionario_id', 'Instalacion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('concessionaire_facilities', function (Blueprint $table) {
           $table->dropColumn('Concesionario_id');
          $table->dropColumn('Instalacion_id');
        });
    }
};
