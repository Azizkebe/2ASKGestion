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
        Schema::create('demande_conges', function (Blueprint $table) {
            $table->id();
            $table->string('prenom')->nullable();
            $table->string('nom')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('id_param_type_conge');
            $table->foreign('id_param_type_conge')->references('id')->on('param_type_conges');
            $table->string('date_depart')->nullable();
            $table->string('date_retour')->nullable();
            $table->string('nombre_jour_conge_pris')->nullable();
            $table->string('motif_demande_conge')->nullable();
            $table->string('id_chef_antenne')->nullable();
            $table->unsignedBigInteger('id_statut_permission')->nullable();
            $table->foreign('id_statut_permission')->references('id')->on('statut_permissions');
            $table->unsignedBigInteger('id_statut_permission_rh')->nullable();
            $table->foreign('id_statut_permission_rh')->references('id')->on('statut_permission_rhs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_conges');
    }
};
