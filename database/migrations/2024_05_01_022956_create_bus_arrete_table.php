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
        Schema::create('bus_arrete', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id')->constrained('bus');
            $table->foreignId('arret_id')->constrained('arret');
            $table->time('heure_arrete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_arrete');
    }
};
