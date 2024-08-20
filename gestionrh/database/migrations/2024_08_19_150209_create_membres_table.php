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
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');

            $table->string('Prenom');

            $table->string('photo_justificative');

            $table->unsignedBigInteger('id_employe');
            $table->foreign('id_employe')->references('id')->on('employes');

            $table->unsignedBigInteger('id_type_membre');
            $table->foreign('id_type_membre')->references('id')->on('type_membres');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membres');
    }
};
