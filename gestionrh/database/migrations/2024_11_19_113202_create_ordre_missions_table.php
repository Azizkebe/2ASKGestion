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
        Schema::create('ordre_missions', function (Blueprint $table) {
            $table->id();
            $table->string('activite')->nullable();
            $table->string('id_user')->nullable();
            $table->string('id_statut_demande_mission')->nullable();
            $table->string('id_validateur')->nullable();
            $table->string('date_depart')->nullable();
            $table->string('type_mission')->nullable();
            $table->string('destination')->nullable();
            $table->string('moyen_transport')->nullable();
            $table->string('date_retour')->nullable();
            $table->string('frais')->nullable();
            $table->string('justificatif')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordre_missions');
    }
};