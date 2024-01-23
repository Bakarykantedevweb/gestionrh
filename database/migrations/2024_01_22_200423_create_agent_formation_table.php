<?php

use App\Models\Agent;
use App\Models\Formation;
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
        Schema::create('agent_formation', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Agent::class)->constrained();
            $table->foreignIdFor(Formation::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_formation');
    }
};
