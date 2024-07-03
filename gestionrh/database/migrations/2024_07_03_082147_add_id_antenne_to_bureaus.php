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
        Schema::table('bureaus', function (Blueprint $table) {
            $table->unsignedBigInteger('id_antenne')->after('bureau');
            $table->foreign('id_antenne')->references('id')->on('antennes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bureaus', function (Blueprint $table) {
            //
        });
    }
};
