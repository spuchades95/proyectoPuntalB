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
        Schema::table('transit_boats', function (Blueprint $table) {
            $table->unsignedBigInteger('Embarcacion_id');
            $table->foreign('Embarcacion_id')->references('id')->on('boats')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('Transito_id');
            $table->foreign('Transito_id')->references('Amarre_id')->on('transits')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['Embarcacion_id', 'Transito_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transit_boats', function (Blueprint $table) {
            $table->dropColumn('Embarcacion_id');
            $table->dropColumn('Transito_id');
        });
    }
};
