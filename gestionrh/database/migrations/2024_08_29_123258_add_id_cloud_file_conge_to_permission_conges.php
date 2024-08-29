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
        Schema::table('permission_conges', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cloud_file_conge')->after('id_param_type_conge')->nullable();
            $table->foreign('id_cloud_file_conge')->references('id')->on('cloud_file_conges');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permission_conges', function (Blueprint $table) {
            //
        });
    }
};
