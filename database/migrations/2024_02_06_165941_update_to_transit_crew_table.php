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
            $table->unsignedBigInteger('Tripulante_id');
            $table->foreign('Tripulante_id')->references('id')->on('crews')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('Transito_id');
            $table->foreign('Transito_id')->references('id')->on('transits')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['Tripulante_id', 'Transito_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transit_crew', function (Blueprint $table) {
            $table->dropColumn('Tripulante_id');
            $table->dropColumn('Transito_id');
        });
    }
};
