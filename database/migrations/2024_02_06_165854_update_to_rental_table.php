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
            $table->unsignedBigInteger('PlazaBase_id')->after('FechaInicio');
            $table->unsignedBigInteger('Embarcacion_id')->after('FechoFinalizacion');
           
            $table->foreign('PlazaBase_id')->references('Amarre_id')->on('base_berths')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Embarcacion_id')->references('id')->on('boats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropColumn('PlazaBase_id');
            $table->dropColumn('Embarcacion_id');
        });
    }
};
