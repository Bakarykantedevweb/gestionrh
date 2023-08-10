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
        Schema::create('convention_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('convention_id')->constrained('conventions')->onDelete('cascade');
            $table->string('libelle');
            $table->string('montant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convention_categories');
    }
};
