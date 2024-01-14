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
            $table->date('date_fin')->nullable();
            $table->integer('anciennete')->nullable();
            $table->string('situation_matrimoniale');
            $table->date('date_mariage')->nullable();
            $table->date('date_divorce')->nullable();
            $table->date('date_voeuf')->nullable();
            $table->integer('nombre_enfant')->default(0);
            $table->string('salaire');
            $table->foreignIdFor(Diplome::class)->constrained();
            $table->foreignIdFor(Agent::class)->constrained();
            $table->foreignIdFor(TypeContrat::class)->constrained();
            $table->foreignIdFor(CentreImpot::class)->constrained();
            $table->foreignIdFor(FeuilleCalcule::class)->constrained();
            $table->float('nombre_jour_conge');
            $table->integer('status')->default(0);
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
