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
            $table->unsignedBigInteger('Administrativo_id');
            $table->foreign('Administrativo_id')->references('Usuario_id')->on('administratives')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('Amarre_id');
            $table->foreign('Amarre_id')->references('id')->on('berths')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['Administrativo_id', 'Amarre_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('administrative_berths', function (Blueprint $table) {
            $table->dropColumn('Administrativo_id');
            $table->dropColumn('Amarre_id');
        });
    }
};
