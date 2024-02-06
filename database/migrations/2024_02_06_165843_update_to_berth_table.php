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
        Schema::table('berths', function (Blueprint $table) {
            $table->unsignedBigInteger('Pantalan');
            $table->foreign('Pantalan')->references('id')->on('docks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berths', function (Blueprint $table) {
            $table->dropColumn('Pantalan');
           
        });
    }
};
