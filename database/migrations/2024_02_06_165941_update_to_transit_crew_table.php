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
        Schema::table('transit_crews', function (Blueprint $table) {
            $table->unsignedBigInteger('Tripulante');
            $table->foreign('Tripulante')->references('id')->on('crews')->onDelete('cascade');
            $table->unsignedBigInteger('Transito');
            $table->foreign('Transito')->references('Amarre')->on('transits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transit_crew', function (Blueprint $table) {
            $table->dropColumn('Tripulante');
            $table->dropColumn('Transito');
        });
    }
};
