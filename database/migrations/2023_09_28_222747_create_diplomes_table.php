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
                'nom' => 'DEF',
            ],
            [
                'nom' => 'BAC',
            ],
            [
                'nom' => 'BAC+2',
            ],
            [
                'nom' => 'BAC+3',
            ],
            [
                'nom' => 'BAC+4',
            ],
            [
                'nom' => 'BAC+5',
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
