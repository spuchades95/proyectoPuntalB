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
        Schema::create('berths', function (Blueprint $table) {
            $table->id();
            $table->string('Estado');
            $table->string('TipoPlaza');
            $table->date('Anio');
            $table->unsignedBigInteger('Pantalan');
            $table->foreign('Pantalan')->references('id')->on('docks')->onDelete('cascade');
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
