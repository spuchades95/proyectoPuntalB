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
        Schema::table('rentals', function (Blueprint $table) {
            $table->unsignedBigInteger('PlazaBase');
            $table->unsignedBigInteger('Embarcacion');
           
            $table->foreign('PlazaBase')->references('id')->on('base_berths')->onDelete('cascade');
            $table->foreign('Embarcacion')->references('id')->on('boats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropColumn('PlazaBase');
            $table->dropColumn('Embarcacion');
        });
    }
};
