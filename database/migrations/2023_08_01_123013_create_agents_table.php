<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

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
            $table->foreignId('departement_id')->constrained('departements')->onDelete('cascade');
            $table->foreignId('poste_id')->constrained('postes')->onDelete('cascade');
            $table->string('login_attempts')->nullable();
            $table->string('last_login_attempt')->nullable();
            $table->integer('blocked')->default('0');
            $table->timestamps();
        });
        DB::table('agents')->insert([
            [
                'matricule' => 'MA001',
                'nom' => 'Coulibaly',
                'prenom' => 'Safiatou',
                'jour' => 1,
                'mois' => 'Fevrier',
                'annee' => 2000,
                'age' => 23,
                'email' => 'safiatou@gmail.com',
                'telephone' => '+223 76 20 50 19',
                'password' => Hash::make('password'),
                'departement_id' => 1,
                'poste_id' => 6,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
