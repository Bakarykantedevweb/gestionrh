<?php

use App\Models\Candidat;
use App\Models\Offre;
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
        Schema::create('postulers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Offre::class)->constrained();
            $table->foreignIdFor(Candidat::class)->constrained();
            $table->integer('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulers');
    }
};
