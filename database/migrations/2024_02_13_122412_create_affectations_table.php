<?php

use App\Models\Agent;
use App\Models\Poste;
use App\Models\Agence;
use App\Models\Departement;
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
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Agent::class)->constrained();
            $table->foreignIdFor(Agence::class)->constrained();
            $table->foreignIdFor(Departement::class)->constrained();
            $table->foreignIdFor(Poste::class)->constrained();
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
