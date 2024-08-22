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
        Schema::create('my_diplomes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_employe');
            $table->foreign('id_employe')->references('id')->on('employes');

            $table->string('commentaire');
            $table->string('date_obtention_diplome');
            $table->string('diplome');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_diplomes');
    }
};
