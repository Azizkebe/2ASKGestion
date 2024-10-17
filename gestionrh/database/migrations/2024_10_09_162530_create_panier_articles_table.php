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
        Schema::create('panier_articles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('id_fourniture')->nullable();
            $table->unsignedBigInteger('id_article');
            $table->foreign('id_article')->references('id')->on('articles');
            $table->string('bureau')->nullable();
            $table->string('Quantite_demandee')->nullable();
            $table->string('Quantite_accordee')->nullable();


            // $table->string('Quantite_accordee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panier_articles');
    }
};
