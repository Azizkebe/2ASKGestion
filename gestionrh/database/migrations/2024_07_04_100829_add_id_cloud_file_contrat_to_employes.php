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
        Schema::table('employes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cloud_file_contrat')->after('id_cloud_file_diplome');
            $table->foreign('id_cloud_file_contrat')->references('id')->on('cloud_file_contrats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employes', function (Blueprint $table) {
            //
        });
    }
};
