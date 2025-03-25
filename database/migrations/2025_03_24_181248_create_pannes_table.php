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
        Schema::create('pannes', function (Blueprint $table) {
            $table->id();
           
            $table->foreignId('poste_id')->constrained('postes')->onDelete('cascade');
            $table->foreignId('employe_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->string('type_panne');
            $table->dateTime('date_signalement');
            $table->string('statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pannes');
    }
};
