<?php

use App\Models\Exercice;
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
        Schema::create('periodes', function (Blueprint $table) {
            $table->id();
            $table->string('mois');
            $table->foreignIdFor(Exercice::class)->constrained();
            $table->timestamps();
        });
        DB::table('periodes')->insert([
            [
                'mois' => 'janvier',
                'exercice_id' => 1
            ],
            [
                'mois' => 'fevrier',
                'exercice_id' => 1
            ],
            [
                'mois' => 'mars',
                'exercice_id' => 1
            ],
            [
                'mois' => 'avril',
                'exercice_id' => 1
            ],
            [
                'mois' => 'mai',
                'exercice_id' => 1
            ],
            [
                'mois' => 'juin',
                'exercice_id' => 1
            ],
            [
                'mois' => 'juillet',
                'exercice_id' => 1
            ],
            [
                'mois' => 'aout',
                'exercice_id' => 1
            ],
            [
                'mois' => 'septembre',
                'exercice_id' => 1
            ],
            [
                'mois' => 'octobre',
                'exercice_id' => 1
            ],
            [
                'mois' => 'novembre',
                'exercice_id' => 1
            ],
            [
                'mois' => 'decembre',
                'exercice_id' => 1
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodes');
    }
};
