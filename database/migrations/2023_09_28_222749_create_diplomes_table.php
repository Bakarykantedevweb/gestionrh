<?php

use App\Models\Classification;
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
            $table->foreignIdFor(Classification::class)->constrained();
            $table->timestamps();
        });
        DB::table('diplomes')->insert([
            [
                'nom' => 'DUT',
                'classification_id' => 4,
            ],
            [
                'nom' => 'LICENCE',
                'classification_id' => 3,
            ],
            [
                'nom' => 'MAITRISE',
                'classification_id' => 2,
            ],
            [
                'nom' => 'MASTER',
                'classification_id' => 1,
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
