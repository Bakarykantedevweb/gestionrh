<?php

use App\Models\Agence;
use App\Models\Agent;
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
        Schema::create('ordre_missions', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('objet');
            $table->string('objetTitre')->nullable();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('duree');
            $table->string('moyen_transport');
            $table->time('heure_depart')->nullable();
            $table->time('heure_retour')->nullable();
            $table->foreignIdFor(Agent::class)->constrained();
            $table->foreignIdFor(Agence::class)->constrained();
            $table->string('superieur_id');
            $table->string('grh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordre_missions');
    }
};
