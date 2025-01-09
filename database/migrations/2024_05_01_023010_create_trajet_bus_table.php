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
        Schema::create('trajet_bus', function (Blueprint $table) {
            $table->id('idtrajet');
            $table->foreignId('bus_id')->constrained('bus')->onDelete('cascade');
            $table->string('lieu_depart');
            $table->string('lieu_arrivee');
            $table->time('heure_depart');
            $table->time('heure_arrivee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajet_bus');
    }
};
