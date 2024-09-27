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
        Schema::table('demande_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('id_statut_permission_rh')->after('id_statut_permission')->nullable();
            $table->foreign('id_statut_permission_rh')->references('id')->on('statut_permission_rhs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demande_permissions', function (Blueprint $table) {
            //
        });
    }
};
