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
        Schema::table('concessionaire_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('Concesionario_id');
            $table->foreign('Concesionario_id')->references('Usuario_id')->on('concessionaires')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('Rol_id');
            $table->foreign('Rol_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['Rol_id', 'Concesionario_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('concessionaire_roles', function (Blueprint $table) {
            $table->dropColumn('Concesionario_id');
            $table->dropColumn('Rol_id');
        });
    }
};
