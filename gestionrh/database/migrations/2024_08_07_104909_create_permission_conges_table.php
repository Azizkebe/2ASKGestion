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
        Schema::create('permission_conges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_employe');
            $table->unsignedBigInteger('id_conge');
            $table->foreign('id_conge')->references('id')->on('conges');
            $table->foreign('id_employe')->references('id')->on('employes');
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
        Schema::dropIfExists('permission_conges');
    }
};
