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
        Schema::create('parkings', function (Blueprint $table) {
            $table->id();
            $table->string('motif')->nullable();
            $table->string('id_user')->nullable();
            $table->string('id_validateur')->nullable();
            $table->string('destination')->nullable();
            $table->string('date_depart')->nullable();
            $table->string('heure_depart')->nullable();
            $table->string('date_retour')->nullable();
            $table->string('heure_retour')->nullable();
            $table->string('nombre_vehicule')->nullable();
            $table->string('nombre_personne')->nullable();
            $table->string('cadre')->nullable();
            $table->string('id_statut_validateur')->nullable();
            $table->string('cloud_file_demande_vehicule')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkings');
    }
};
