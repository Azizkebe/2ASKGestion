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
        Schema::create('historique_conges', function (Blueprint $table) {
            $table->id();
            $table->string('id_employe')->nullable();
            $table->string('id_conge')->nullable();
            $table->string('date_depart');
            $table->string('date_retour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_conges');
    }
};
