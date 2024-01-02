<?php

use App\Models\Categorie;
use App\Models\TypeContrat;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->date('date_publication');
            $table->date('date_limite');
            $table->integer('nombre_place');
            $table->string('image');
            $table->foreignIdFor(Categorie::class)->constrained();
            $table->foreignIdFor(TypeContrat::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
