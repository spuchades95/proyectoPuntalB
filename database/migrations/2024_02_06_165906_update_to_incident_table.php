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
            $table->unsignedBigInteger('Guardamuelle');            
            $table->unsignedBigInteger('Administrativo');
            $table->foreign('Guardamuelle')->references('id')->on('dock_workers')->onDelete('cascade');
            $table->foreign('Administrativo')->references('id')->on('administratives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incidents', function (Blueprint $table) {
            $table->dropColumn('Guardamuelle');
            $table->dropColumn('Administrativo');
        });
    }
};
