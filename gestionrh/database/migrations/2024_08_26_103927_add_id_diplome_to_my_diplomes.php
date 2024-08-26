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
        Schema::table('my_diplomes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_diplome')->after('id_employe');
            $table->foreign('id_diplome')->references('id')->on('mon_diplomes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('my_diplomes', function (Blueprint $table) {
            //
        });
    }
};
