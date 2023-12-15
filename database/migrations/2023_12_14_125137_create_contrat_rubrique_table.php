<?php

use App\Models\Contrat;
use App\Models\Rubrique;
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
        Schema::create('contrat_rubrique', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Contrat::class)->constrained();
            $table->foreignIdFor(Rubrique::class)->constrained();
            $table->integer('montant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrat_rubrique');
    }
};
