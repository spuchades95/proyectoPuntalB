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
            $table->unsignedBigInteger('GuardaCivil');
            $table->foreign('GuardaCivil')->references('Usuario')->on('civil_guards')->onDelete('cascade');
            $table->unsignedBigInteger('Transito');
            $table->foreign('Transito')->references('Amarre')->on('transits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('civil_guard_transits', function (Blueprint $table) {
            $table->dropColumn('GuardaCivil');
            $table->dropColumn('Transito');
        });
    }
};
