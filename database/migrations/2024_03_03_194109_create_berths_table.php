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
        Schema::create('base_berths', function (Blueprint $table) {
            Schema::dropIfExists('base_berths');
            $table->id();
            $table->unsignedBigInteger('Amarre_id');
            $table->foreign('Amarre_id')->references('id')->on('berths')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berths');
    }
};
