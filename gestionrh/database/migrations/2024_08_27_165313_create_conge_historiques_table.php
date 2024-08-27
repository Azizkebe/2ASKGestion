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
        Schema::create('conge_historiques', function (Blueprint $table) {
            $table->id();
            $table->string('id_employe')->nullable();;
            $table->string('id_param_type_conge')->nullable();;
            $table->string('date_depart')->nullable();;
            $table->string('date_retour')->nullable();;
            $table->string('nombre_jours_pris')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conge_historiques');
    }
};
