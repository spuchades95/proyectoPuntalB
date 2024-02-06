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
        Schema::table('administrative_berths', function (Blueprint $table) {
            $table->unsignedBigInteger('Administrativo');
            $table->foreign('Administrativo')->references('Usuario')->on('administratives')->onDelete('cascade');
            $table->unsignedBigInteger('Amarre');
            $table->foreign('Amarre')->references('id')->on('berths')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('administrative_berths', function (Blueprint $table) {
            $table->dropColumn('Administrativo');
            $table->dropColumn('Amarre');
        });
    }
};
