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
        Schema::create('feuille_calcule_rubrique', function (Blueprint $table) {
            $table->unsignedBigInteger('feuille_calcule_id');
            $table->unsignedBigInteger('rubrique_id');

            $table->foreign('feuille_calcule_id')->references('id')->on('feuille_calcules')->onDelete('cascade');
            $table->foreign('rubrique_id')->references('id')->on('rubriques')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feuille_rubrique');
    }
};
