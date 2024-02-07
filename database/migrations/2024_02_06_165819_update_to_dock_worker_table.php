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
        Schema::table('dock_workers', function (Blueprint $table) {
            $table->unsignedBigInteger('Usuario_id')->primary();      
            $table->foreign('Usuario_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dock_workers', function (Blueprint $table) {
            $table->dropColumn('Usuario_id');
        });
    }
};
