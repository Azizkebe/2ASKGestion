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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_employe');
            $table->foreign('id_employe')->references('id')->on('employes');
            $table->integer('nombre_de_jour');
            $table->string('date_depart');
            $table->string('date_retour');
            $table->string('commentaire');
            $table->unsignedBigInteger('id_statut_permission');
            $table->foreign('id_statut_permission')->references('id')->on('statut_permissions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
