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
        Schema::create('demande_cartes', function (Blueprint $table) {
            $table->id();
            $table->string('utilisateur_nom');
            $table->string('prenom_utilisateur');
            $table->unsignedBigInteger('user_id'); // Ajout de la colonne 'user_id'
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->string('numero_de_carte')->unique();
            $table->string('adresse');
            $table->unsignedBigInteger('bus_id');
    $table->foreign('bus_id')->references('id')->on('bus')->onDelete('cascade');
            $table->integer('mois_demande');
            $table->boolean('cart_active')->default(false);
            $table->date('date_naissance')->nullable(); // Ajout de la colonne date_naissance
            $table->string('etablissement')->nullable(); // Ajout de la colonne etablissement
            $table->enum('genre', ['Homme', 'Femme'])->nullable(); // Enum for 'genre' column
            $table->string('phone_number')->nullable();
            $table->string('document_validation')->nullable(); // Adding the 'document_validation' column
            $table->enum('dossier_accepte', ['Accepté', 'Refusé', 'en attente'])->default('en attente');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_carte');
    }
};
