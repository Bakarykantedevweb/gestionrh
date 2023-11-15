<?php

use App\Models\Bulletin;
use App\Models\Rubrique;
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
        Schema::create('bulletin_rubrique', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bulletin::class)->constrained();
            $table->foreignIdFor(Rubrique::class)->constrained();
            $table->string('montant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulletin_rubrique');
    }
};
