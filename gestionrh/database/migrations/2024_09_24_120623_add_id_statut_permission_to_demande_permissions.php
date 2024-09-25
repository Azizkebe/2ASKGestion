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
            $table->unsignedBigInteger('id_statut_permission')->after('id_chef_antenne')->nullable();
            $table->foreign('id_statut_permission')->references('id')->on('statut_permissions');
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
