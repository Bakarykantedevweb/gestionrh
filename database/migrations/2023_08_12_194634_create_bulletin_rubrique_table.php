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
        Schema::create('bulletin_rubrique', function (Blueprint $table) {
            $table->unsignedBigInteger('bulletin_id');
            $table->unsignedBigInteger('rubrique_id');
            $table->string('valeur');
            $table->timestamps();

            $table->foreign('bulletin_id')->references('id')->on('bulletins')->onDelete('cascade');
            $table->foreign('rubrique_id')->references('id')->on('rubriques')->onDelete('cascade');
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
