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
        Schema::table('transits', function (Blueprint $table) {
            $table->unsignedBigInteger('Guardamuelles_id');
            $table->foreign('Guardamuelles_id')->references('id')->on('dock_workers')->onDelete('cascade');
            $table->unsignedBigInteger('Administrativo_id');
            $table->foreign('Administrativo_id')->references('id')->on('administratives')->onDelete('cascade');
            $table->unsignedBigInteger('Amarre_id');
            $table->foreign('Amarre_id')->references('id')->on('berths')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transits', function (Blueprint $table) {
            $table->dropColumn('Guardamuelles_id');
            $table->dropColumn('Administrativo_id');
            $table->dropColumn('Amarre_id');
        });
    }
};
