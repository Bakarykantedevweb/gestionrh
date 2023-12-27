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
        Schema::create('classifications', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('montant');
            $table->timestamps();
        });
        DB::table('classifications')->insert([
            [
                'nom' => 'A',
                'montant' => '400000',
            ],
            [
                'nom' => 'B2',
                'montant' => '300000',
            ],
            [
                'nom' => 'C',
                'montant' => '200000',
            ],
            [
                'nom' => 'D',
                'montant' => '100000',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classifications');
    }
};
