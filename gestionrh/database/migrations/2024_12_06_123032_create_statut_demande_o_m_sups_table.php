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
        Schema::create('statut_demande_o_m_sups', function (Blueprint $table) {
            $table->id();
            $table->enum('statut_demande_OM_Sup',['En cours','Validée','Rejetée'])->default('En cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statut_demande_o_m_sups');
    }
};
