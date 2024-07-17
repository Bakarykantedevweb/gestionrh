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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });
        DB::table('categories')->insert([
            [
                'nom' => 'Moins 1 an',
            ],
            [
                'nom' => '2 ans',
            ],
            [
                'nom' => '3 ans',
            ],
            [
                'nom' => '4 ans',
            ],
            [
                'nom' => 'Plus de 5 ans',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
