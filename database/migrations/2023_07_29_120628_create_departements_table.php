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
        Schema::create('departements', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('nom');
            $table->timestamps();
        });
        DB::table('departements')->insert([
            [
                'code' => 'DSI',
                'nom' => 'Direction des Systemes d\'information',
            ],
            [
                'code' => 'DO',
                'nom' => 'Direction des Operations',
            ],
            [
                'code' => 'DCH',
                'nom' => 'Direction des Capitals Humains',
            ],
            [
                'code' => 'DFC',
                'nom' => 'Direction des Finances Comptabilites',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departements');
    }
};
