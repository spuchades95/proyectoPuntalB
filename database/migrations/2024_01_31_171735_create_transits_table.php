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
        Schema::create('transits', function (Blueprint $table) {
          //  $table->id();
            $table->string('Proposito');
            $table->date('FechaEntrada')->nullable();
            $table->date('FechaSalida')->nullable();
            $table->string('Causa');
            $table->boolean('Autorizacion');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transits');
    }
};
