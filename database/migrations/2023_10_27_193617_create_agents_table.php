<?php

use App\Models\Agence;
use App\Models\Departement;
use App\Models\Diplome;
use App\Models\Poste;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->integer('jour');
            $table->string('mois');
            $table->integer('annee');
            $table->integer('age');
            $table->string('telephone');
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('sexe')->nullable();
            $table->foreignIdFor(Agence::class)->constrained();
            $table->foreignIdFor(Departement::class)->constrained();
            $table->foreignIdFor(Poste::class)->constrained();
            $table->string('login_attempts')->nullable();
            $table->string('last_login_attempt')->nullable();
            $table->integer('blocked')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
