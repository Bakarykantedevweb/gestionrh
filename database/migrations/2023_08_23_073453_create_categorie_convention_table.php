<?php

use App\Models\Categorie;
use App\Models\Convention;
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
        Schema::create('categorie_convention', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Categorie::class)->constrained();
            $table->foreignIdFor(Convention::class)->constrained();
            // Autres colonnes éventuelles
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorie_convention');
    }
};
