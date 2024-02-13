<?php

use App\Models\Formateur;
use App\Models\TypeFormation;
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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->longText('description');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('status')->default(0);
            $table->time('heure');
            $table->string('fichier');
            $table->foreignIdFor(TypeFormation::class)->constrained();
            $table->foreignIdFor(Formateur::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
