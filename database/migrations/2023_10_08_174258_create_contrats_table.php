<?php

use App\Models\Agent;
use App\Models\Categorie;
use App\Models\CentreImpot;
use App\Models\Convention;
use App\Models\Diplome;
use App\Models\FeuilleCalcule;
use App\Models\TypeConge;
use App\Models\TypeContrat;
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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->date('date_creation');
            $table->integer('anciennete');
            $table->string('situation_matrimoniale');
            $table->date('date_mariage')->nullable();
            $table->date('date_divorce')->nullable();
            $table->date('date_voeuf')->nullable();
            $table->string('nombre_enfant')->nullable();
            $table->string('nombre_femme')->nullable();
            $table->string('prefix');
            $table->string('compte');
            $table->string('salaire');
            $table->string('profil');
            $table->string('classification');
            $table->foreignIdFor(Agent::class)->constrained();
            $table->foreignIdFor(TypeContrat::class)->constrained();
            $table->foreignIdFor(Diplome::class)->constrained();
            $table->foreignIdFor(CentreImpot::class)->constrained();
            $table->foreignIdFor(Convention::class)->constrained();
            $table->foreignIdFor(Categorie::class)->constrained();
            $table->foreignIdFor(FeuilleCalcule::class)->constrained();
            $table->integer('nombre_jour_travail');
            $table->float('nombre_jour_conge');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
