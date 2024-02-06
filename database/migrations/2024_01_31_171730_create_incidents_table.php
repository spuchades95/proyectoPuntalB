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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo');
            $table->string('Imagen');
            $table->string('Descripcion');
            $table->unsignedBigInteger('Guardamuelle');
            
            $table->unsignedBigInteger('Administrativo');
            $table->foreign('Guardamuelle')->references('id')->on('dock_workers')->onDelete('cascade');
            $table->foreign('Administrativo')->references('id')->on('administratives')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
