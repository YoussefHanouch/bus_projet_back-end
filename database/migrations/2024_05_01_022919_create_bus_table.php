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
        Schema::create('bus', function (Blueprint $table) {
            $table->id();
            $table->string('numéro_de_bus');
            $table->string('modèle');
            $table->string('immatriculation');
            $table->string('Origine');
            $table->string('Destination');
            $table->string('Tarifs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus');
    }
};
