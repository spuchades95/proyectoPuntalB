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
        Schema::create('transit_boats', function (Blueprint $table) {
         /*   Schema::dropIfExists('transit_boats');
           $table->id();
           $table->unsignedBigInteger('Embarcacion_id');
           $table->foreign('Embarcacion_id')->references('id')->on('boats')->onDelete('cascade')->onUpdate('cascade');
           $table->unsignedBigInteger('Transito_id');
           $table->foreign('Transito_id')->references('id')->on('transits')->onDelete('cascade')->onUpdate('cascade');
           $table->date('FechaEntrada')->nullable();
           $table->date('FechaSalida')->nullable();
           $table->string('Causa')->nullable();
            $table->softDeletes();
            $table->timestamps();*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      //  Schema::dropIfExists('transit_boats');
    }
};
