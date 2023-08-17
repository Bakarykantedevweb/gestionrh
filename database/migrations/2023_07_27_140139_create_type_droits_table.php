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
        Schema::create('type_droits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });
        DB::table('type_droits')->insert([
            ['nom' => 'Administration'],
            ['nom' => 'Relations'],
            ['nom' => 'Développement'],
            ['nom' => 'Communication'],
            ['nom' => 'Parametre'],
            ['nom' => 'Salaire'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types_droits');
    }
};
