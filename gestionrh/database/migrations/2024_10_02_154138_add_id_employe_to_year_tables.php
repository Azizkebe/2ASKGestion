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
        Schema::table('year_tables', function (Blueprint $table) {
            $table->unsignedBigInteger('employe_id')->after('annee_en_cours')->nullable();
            $table->foreign('employe_id')->references('id')->on('employes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('year_tables', function (Blueprint $table) {
            //
        });
    }
};
