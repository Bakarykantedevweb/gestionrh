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
        Schema::create('droit_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->foreignId('droit_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        DB::table('droit_role')->insert([
            [
                "role_id" => 1,
                "droit_id" => 1,
            ],
            [
                "role_id" => 1,
                "droit_id" => 2,
            ],
            [
                "role_id" => 1,
                "droit_id" => 3,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('droit_role');
    }
};
