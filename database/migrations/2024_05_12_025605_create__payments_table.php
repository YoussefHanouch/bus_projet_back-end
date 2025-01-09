<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('cart_id');
            $table->foreign('cart_id')->references('id')->on('demande_cartes')->onDelete('cascade');
            $table->string('card_number'); // Numéro de carte
            $table->string('card_holder_name'); // Nom du titulaire de la carte
            $table->string('card_expiry'); // Date d'expiration de la carte (peut être sous forme de chaîne ou séparée en mois et année)
            $table->string('card_cvc'); // Code de vérification de la carte
            $table->decimal('amount', 10, 2); // Montant payé
            $table->dateTime('paid_at'); // Date et heure du paiement
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
