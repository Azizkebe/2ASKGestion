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
        Schema::table('fiche_contrats', function (Blueprint $table) {
            $table->unsignedBigInteger('id_contrat')->after('id_employe');
            $table->foreign('id_contrat')->references('id')->on('contrats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fiche_contrats', function (Blueprint $table) {
            //
        });
    }
};
