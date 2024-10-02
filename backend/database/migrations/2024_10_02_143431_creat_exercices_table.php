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
        Schema::create('exercices', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // QCM, Question réponse, Vrai ou faux, Rédaction
            $table->foreignId('chapitre_id')->constrained()->onDelete('cascade'); // Relation avec le chapitre
            $table->text('corrige')->nullable(); // Corrigé optionnel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercices');
    }
};
