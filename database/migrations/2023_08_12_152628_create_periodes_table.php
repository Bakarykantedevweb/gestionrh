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
        Schema::create('periodes', function (Blueprint $table) {
            $table->id();
            $table->string('mois');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        DB::table('periodes')->insert([
            [
                'mois' => 'janvier',
            ],
            [
                'mois' => 'fevrier',
            ],
            [
                'mois' => 'mars',
            ],
            [
                'mois' => 'avril',
            ],
            [
                'mois' => 'mai',
            ],
            [
                'mois' => 'juin',
            ],
            [
                'mois' => 'juillet',
            ],
            [
                'mois' => 'aout',
            ],
            [
                'mois' => 'septembre',
            ],
            [
                'mois' => 'octobre',
            ],
            [
                'mois' => 'novembre',
            ],
            [
                'mois' => 'decembre',
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
