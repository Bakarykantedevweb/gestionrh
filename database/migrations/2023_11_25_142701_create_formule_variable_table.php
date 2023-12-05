<?php

use App\Models\Formule;
use App\Models\Variable;
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
        Schema::create('formule_variable', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Formule::class)->constrained();
            $table->foreignIdFor(Variable::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formule_variable');
    }
};
