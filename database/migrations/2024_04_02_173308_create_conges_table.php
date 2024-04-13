<?php

use App\Models\Agent;
use App\Models\TypeConge;
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
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Agent::class)->constrained();
            $table->foreignIdFor(TypeConge::class)->constrained();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('duree');
            $table->text('motif');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conges');
    }
};
