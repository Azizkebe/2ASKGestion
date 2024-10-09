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
        Schema::create('detail_fournitures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fourniture');
            $table->foreign('id_fourniture')->references('id')->on('fournitures');

            $table->unsignedBigInteger('id_article');
            $table->foreign('id_article')->references('id')->on('articles');

            $table->string('Quantite_demandee');

            $table->string('Quantite_accordee')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_fournitures');
    }
};
