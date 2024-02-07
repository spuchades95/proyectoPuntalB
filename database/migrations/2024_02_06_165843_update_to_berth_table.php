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
            $table->unsignedBigInteger('Pantalan_id')->after('Causa');
            $table->foreign('Pantalan_id')->references('id')->on('docks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berths', function (Blueprint $table) {
            $table->dropColumn('Pantalan_id');
           
        });
    }
};
