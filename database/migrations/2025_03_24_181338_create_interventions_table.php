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
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('panne_id')->constrained('pannes')->onDelete('cascade');
            $table->foreignId('technicien_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->text('description');
            $table->string('pieces_remplacees')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('statut_intervention');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
