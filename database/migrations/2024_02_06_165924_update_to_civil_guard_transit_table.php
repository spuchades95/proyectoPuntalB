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
        Schema::table('civil_guard_transits', function (Blueprint $table) {
            $table->unsignedBigInteger('GuardaCivil_id')->after('FechaVisualizacion');
            $table->foreign('GuardaCivil_id')->references('Usuario_id')->on('civil_guards')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('Transito_id');
            $table->foreign('Transito_id')->references('id')->on('transits')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['GuardaCivil_id', 'Transito_id']);
       
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('civil_guard_transits', function (Blueprint $table) {
            $table->dropColumn('GuardaCivil_id');
            $table->dropColumn('Transito_id');
        });
    }
};
