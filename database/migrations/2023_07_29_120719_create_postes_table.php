<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('postes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });
        DB::table('postes')->insert([
            [
                'nom' => 'Responsable DSI',
            ],
            [
                'nom' => 'Responsable DO',
            ],
            [
                'nom' => 'Responsable DCH',
            ],
            [
                'nom' => 'Responsable DFC',
            ],
            [
                'nom' => 'Responsable Sécurité',
            ],
            [
                'nom' => 'Responsable Entité Systèmes et Réseaux',
            ],
            [
                'nom' => 'Responsable Entité  Bases de Données',
            ],
            [
                'nom' => 'Responsable Entité Dévelop Appl Externe',
            ],
            [
                'nom' => 'Administration RH et relations sociales',
            ],
            [
                'nom' => 'Responsable Entité Développement RH',
            ],
            [
                'nom' => 'Responsable Entité Communication interne',
            ],
            [
                'nom' => 'Agent',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postes');
    }
};
