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
        Schema::table('param_type_conges', function (Blueprint $table) {
            $table->unsignedBigInteger('id_yeartable')->after('type_de_conge')->nullable();
            $table->foreign('id_yeartable')->references('id')->on('year_tables');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('param_type_conges', function (Blueprint $table) {
            //
        });
    }
};
