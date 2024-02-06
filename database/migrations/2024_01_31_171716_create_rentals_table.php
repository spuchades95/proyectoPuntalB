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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('PlazaBase');
            $table->unsignedBigInteger('Embarcacion');
            $table->date('FechaInicio');
            
            $table->date('FechoFinalizacion');
            $table->foreign('PlazaBase')->references('id')->on('base_berths')->onDelete('cascade');
            $table->foreign('Embarcacion')->references('id')->on('boats')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
