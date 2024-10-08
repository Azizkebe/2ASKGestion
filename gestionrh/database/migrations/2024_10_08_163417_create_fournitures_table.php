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
        Schema::create('fournitures', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_projet');
            $table->foreign('id_projet')->references('id')->on('projets');

            $table->string('motif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournitures');
    }
};
