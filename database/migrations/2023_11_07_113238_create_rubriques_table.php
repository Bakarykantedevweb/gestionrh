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
        Schema::create('rubriques', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->unique();
            $table->string('libelle');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        // DB::table('rubriques')->insert([
        //     [
        //         'code' => 'R1',
        //         'libelle' => 'Sur Salaire',
        //     ],
        //     [
        //         'code' => 'R2',
        //         'libelle' => 'Prime Responsable',
        //     ],
        //     [
        //         'code' => 'R3',
        //         'libelle' => 'Prime Direction',
        //     ],
        //     [
        //         'code' => 'R4',
        //         'libelle' => 'Prime Informatique',
        //     ],
        //     [
        //         'code' => 'R5',
        //         'libelle' => 'Indemnité de Caisse',
        //     ],
        //     [
        //         'code' => 'R6',
        //         'libelle' => 'Prime Charge Affaire',
        //     ],
        //     [
        //         'code' => 'R7',
        //         'libelle' => 'Prime Charge Clientel',
        //     ],
        //     [
        //         'code' => 'R8',
        //         'libelle' => 'Indemnité Spéciale'
        //     ],
        //     [
        //         'code' => 'R9',
        //         'libelle' => 'Indemnité de Cherté de Vie'
        //     ],
        //     [
        //         'code' => 'R10',
        //         'libelle' => 'Indemnité de solidarité'
        //     ],
        //     [
        //         'code' => 'R11',
        //         'libelle' => 'Indemnité de transport'
        //     ],
        //     [
        //         'code' => 'R12',
        //         'libelle' => 'Allocations familiales'
        //     ],
        //     [
        //         'code' => 'R13',
        //         'libelle' => 'Prime chef Agence'
        //     ],
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rubriques');
    }
};
