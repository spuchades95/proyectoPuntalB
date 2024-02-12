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
        Schema::table('incidents', function (Blueprint $table) {
            $table->unsignedBigInteger('Guardamuelle_id')->after('Imagen');           
            $table->unsignedBigInteger('Administrativo_id')->after('Descripcion');
            $table->foreign('Guardamuelle_id')->references('Usuario_id')->on('dock_workers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Administrativo_id')->references('Usuario_id')->on('administratives')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incidents', function (Blueprint $table) {
            $table->dropColumn('Guardamuelle_id');
            $table->dropColumn('Administrativo_id');
        });
    }
};
