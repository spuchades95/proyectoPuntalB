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
            $table->unsignedBigInteger('Guardamuelle_id');            
            $table->unsignedBigInteger('Administrativo_id');
            $table->foreign('Guardamuelle_id')->references('id')->on('dock_workers')->onDelete('cascade');
            $table->foreign('Administrativo_id')->references('id')->on('administratives')->onDelete('cascade');
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
