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
        Schema::table('base_berths', function (Blueprint $table) {
            $table->unsignedBigInteger('Amarre_id');
            $table->foreign('Amarre_id')->references('id')->on('berths')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('base_berths', function (Blueprint $table) {
            $table->dropColumn('Amarre');
        });
    }
};
