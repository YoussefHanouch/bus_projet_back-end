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
        Schema::create('cart_bus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('users');
            $table->string('numéro_de_cart');
            $table->decimal('solde', 8, 2);
            $table->date('date_expiration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_bus');
    }
};
