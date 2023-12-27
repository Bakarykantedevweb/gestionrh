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
        Schema::create('centre_impots', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->timestamps();
        });
        DB::table('centre_impots')->insert([
            [
                'libelle' => 'Commune 1',
            ],
            [
                'libelle' => 'Commune 2',
            ],
            [
                'libelle' => 'Commune 3',
            ],
            [
                'libelle' => 'Commune 4',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centre_impots');
    }
};
