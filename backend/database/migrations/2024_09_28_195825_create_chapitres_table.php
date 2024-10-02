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
        Schema::create('chapitres', function (Blueprint $table) {
            $table->id();
            $table->string('titre'); // Titre du chapitre
            $table->string('professeur'); // Titre du chapitre
            // $table->unsignedBigInteger('module_id'); // Clé étrangère vers les modules
            $table->timestamps();

            // Relation avec la table modules
            // $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreignId('module_id')->constrained()->onDelete('cascade'); // Relation avec le module
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapitres');
    }
};
