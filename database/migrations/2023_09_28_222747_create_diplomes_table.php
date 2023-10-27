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
        Schema::create('diplomes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });
        DB::table('diplomes')->insert([
            [
                'nom' => 'BAC',
            ],
            [
                'nom' => 'DUT',
            ],
            [
                'nom' => 'LICENCE',
            ],
            [
                'nom' => 'MAITRISE',
            ],
            [
                'nom' => 'MASTER',
            ],
            [
                'nom' => 'DEA',
            ],
            [
                'nom' => 'MPA',
            ],
            [
                'nom' => 'DESS',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diplomes');
    }
};
