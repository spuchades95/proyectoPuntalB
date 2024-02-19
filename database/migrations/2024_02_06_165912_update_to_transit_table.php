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
            $table->unsignedBigInteger('Guardamuelles_id')->after('FechaEntrada') ->nullable();
            $table->foreign('Guardamuelles_id')->references('Usuario_id')->on('dock_workers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('Administrativo_id') ->nullable();
            $table->foreign('Administrativo_id')->references('Usuario_id')->on('administratives')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('Amarre_id')->after('id') ->nullable();
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
