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
            $table->id();
            $table->string('Proposito');
            $table->date('FechaEntrada');
            $table->unsignedBigInteger('Guardamuelles');
            $table->foreign('Guardamuelles')->references('id')->on('dock_workers')->onDelete('cascade');
            $table->unsignedBigInteger('Administrativo');
            
            $table->foreign('Administrativo')->references('id')->on('administratives')->onDelete('cascade');
            $table->unsignedBigInteger('Amarre');
            $table->foreign('Amarre')->references('id')->on('berths')->onDelete('cascade');
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
