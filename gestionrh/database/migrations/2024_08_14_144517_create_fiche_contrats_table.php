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
        Schema::create('fiche_contrats', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_employe');
            $table->foreign('id_employe')->references('id')->on('employes');

            $table->string('date_obtention_contrat');

            $table->string('date_fin_contrat')->nullable();

            $table->string('commentaire');

            $table->string('fichier_contrat');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_contrats');
    }
};
