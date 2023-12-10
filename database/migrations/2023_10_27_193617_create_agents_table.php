<?php

use App\Models\Diplome;
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
                'nom'=>'Kante',
                'prenom' => 'Bakary',
                'jour' => 27,
                'mois' => 'Avril',
                'annee' => 2002,
                'age' => 21,
                'telephone' => '89247070',
                'departement_id' => 1,
                'poste_id' => 1,
                'email' => 'kantebakary742@gmail.com',
                'password' => Hash::make('password'),
                'photo' => '1701787382.jpg'
            ],
            [
                'matricule' => 'MA002',
                'nom' => 'Diallo',
                'prenom' => 'Fousseyni',
                'jour' => 22,
                'mois' => 'Juin',
                'annee' => 2001,
                'age' => 22,
                'telephone' => '73442134',
                'departement_id' => 2,
                'poste_id' => 2,
                'email' => 'fousby000@gmail.com',
                'password' => Hash::make('password'),
                'photo' => '1701787382.jpg'
            ],
            [
                'matricule' => 'MA003',
                'nom' => 'Coulibaly',
                'prenom' => 'Awa',
                'jour' => 2,
                'mois' => 'Septembre',
                'annee' => 2005,
                'age' => 18,
                'telephone' => '83560690',
                'departement_id' => 3,
                'poste_id' => 3,
                'email' => 'evecoulibaly324@gmail.com',
                'password' => Hash::make('password'),
                'photo' => '1701787382.jpg'
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
