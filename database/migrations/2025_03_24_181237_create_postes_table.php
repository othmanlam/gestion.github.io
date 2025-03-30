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
        Schema::create('postes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_serie')->unique();
            $table->string('modele');
            $table->string('emplacement');
            $table->foreignId('responsable_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->enum('etat', ['Disponible', 'En Panne', 'En Réparation']);            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postes');
    }
};
