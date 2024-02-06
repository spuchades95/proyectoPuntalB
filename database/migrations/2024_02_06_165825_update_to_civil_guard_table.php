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
        Schema::table('civil_guards', function (Blueprint $table) {
            $table->unsignedBigInteger('Usuario');        
            $table->foreign('Usuario')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('civil_guards', function (Blueprint $table) {
            $table->dropColumn('Usuario');
        });
    }
};
