<?php

use App\Models\FeuilleCalcule;
use App\Models\Rubrique;
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
        Schema::create('feuille_calcule_rubrique', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FeuilleCalcule::class)->constrained();
            $table->foreignIdFor(Rubrique::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feuille_calcule_rubrique');
    }
};
