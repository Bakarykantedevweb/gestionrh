<?php

use App\Models\Question;
use App\Models\Performance;
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
        Schema::create('performance_question', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Performance::class)->constrained();
            $table->foreignIdFor(Question::class)->constrained();
            $table->integer('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_question');
    }
};
