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
                'nom' => 'Agent',
            ],
            [
                'nom' => 'Responsable DSI-TG',
            ],
            [
                'nom' => 'Responsable Sécurité ',
            ],
            [
                'nom' => 'Responsable Entité Systèmes et Réseaux',
            ],
            [
                'nom' => 'Responsable Entité Exploitation',
            ]
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
