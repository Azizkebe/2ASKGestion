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
        Schema::create('demande_fournitures', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('Projet')->nullable();
            $table->string('Motif')->nullable();
            $table->string('Bureau')->nullable();
            $table->string('Etat')->nullable();
            $table->string('Article')->nullable();
            // $table->string('id_fourniture')->nullable();
            $table->string('Quantite_demandee')->nullable();
            $table->string('Quantite_accordee')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_fournitures');
    }
};
