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
        Schema::create('conges', function (Blueprint $table) {

            $table->id();

            $table->enum('type_conge',['Congé Annuel','Congé Obligatoire',
            'Congé Supplementaire hier','Congé Special','Congé de paternite ou parental',
            'Congé à Salaire différé','Congé Medical'])->default('Congé Annuel');

            $table->integer('nombre_jour_conge');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conges');
    }
};
