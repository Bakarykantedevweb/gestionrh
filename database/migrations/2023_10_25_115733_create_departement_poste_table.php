<?php

use App\Models\Poste;
use App\Models\Departement;
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
        Schema::create('departement_poste', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Departement::class)->constrained();
            $table->foreignIdFor(Poste::class)->constrained();
            $table->timestamps();
        });
        DB::table('departement_poste')->insert([
            [
                "departement_id" => 1,
                "poste_id" => 1,
            ],
            [
                "departement_id" => 1,
                "poste_id" => 2,
            ],
            [
                "departement_id" => 1,
                "poste_id" => 3,
            ],
            [
                "departement_id" => 1,
                "poste_id" => 4,
            ],
            [
                "departement_id" => 1,
                "poste_id" => 5,
            ],
            [
                "departement_id" => 1,
                "poste_id" => 6,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departement_poste');
    }
};
