<?php

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
        Schema::create('droits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->boolean('acces');
            $table->string('route', 50);
            $table->foreignId('type_droit_id')->constrained('type_droits')->onDelete('cascade');
            $table->timestamps();
        });
        DB::table('droits')->insert([
            [
                'nom' => 'Role',
                'acces' => 1,
                'route' => 'role.index',
                'type_droit_id' => 3,
            ],
            [
                'nom' => 'Autorisation',
                'acces' => 1,
                'route' => 'droit.index',
                'type_droit_id' => 3,
            ],
            [
                'nom' => 'Utilisateur',
                'acces' => 1,
                'route' => 'user.index',
                'type_droit_id' => 3,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('droits');
    }
};
