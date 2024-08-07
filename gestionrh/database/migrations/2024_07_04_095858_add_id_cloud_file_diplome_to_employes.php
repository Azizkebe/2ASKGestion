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
            $table->unsignedBigInteger('id_cloud_file_diplome')->after('id_cloud_file_cv')->nullable();
            $table->foreign('id_cloud_file_diplome')->references('id')->on('cloud_file_diplomes');
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
