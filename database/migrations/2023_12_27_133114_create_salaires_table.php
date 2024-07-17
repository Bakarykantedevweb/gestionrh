<?php

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
        Schema::create('salaires', function (Blueprint $table) {
            $table->id();
            $table->integer('salaire_debut');
            $table->integer('salaire_fin');
            $table->timestamps();
        });
        DB::table('salaires')->insert([
            [
                'salaire_debut' => 100000,
                'salaire_fin' => 200000,
            ],
            [
                'salaire_debut' => 200000,
                'salaire_fin' => 300000,
            ],
            [
                'salaire_debut' => 300000,
                'salaire_fin' => 400000,
            ],
            [
                'salaire_debut' => 400000,
                'salaire_fin' => 500000,
            ],
            [
                'salaire_debut' => 500000,
                'salaire_fin' => 600000,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaires');
    }
};
