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
        DB::table('rubriques')->insert([
            [
                'code' => 'R-01',
                'libelle' => 'SurSalaire',
            ],
            [
                'code' => 'R-02',
                'libelle' => 'Aide Famille',
            ],
            [
                'code' => 'R-03',
                'libelle' => 'Prime de responsabilite',
            ],
            [
                'code' => 'R-04',
                'libelle' => 'Indemnite de transport',
            ],
            [
                'code' => 'R-05',
                'libelle' => 'Indemnite de logement',
            ],
            [
                'code' => 'R-06',
                'libelle' => 'Eau-Electricite',
            ],
            [
                'code' => 'R-07',
                'libelle' => 'Indemnite de solidarite ',
            ],
            [
                'code' => 'R-08',
                'libelle' => 'Majoration Ind',
            ],
            [
                'code' => 'R-09',
                'libelle' => 'Prime Ramadan',
            ],
            [
                'code' => 'R-10',
                'libelle' => 'Prime Tabaski',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rubriques');
    }
};
