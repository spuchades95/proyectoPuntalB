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
            $table->unsignedBigInteger('Concesionario');
            $table->foreign('Concesionario')->references('Usuario')->on('concessionaires')->onDelete('cascade');
            $table->unsignedBigInteger('Rol');
            $table->foreign('Rol')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('concessionaire_roles', function (Blueprint $table) {
            $table->dropColumn('Concesionario');
            $table->dropColumn('Rol');
        });
    }
};
