<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->foreignId('role_id')->constrained();
            $table->foreignId('role_type_user_id')->constrained('role_type_users')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            [
                'name' => 'Bakary Kante',
                'email' => 'informaticien@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'role_type_user_id' => 2,
                'photo' => '1700865517.jpg'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('role_type_user_id');
            $table->dropForeign('role_id');
        });
        Schema::dropIfExists('users');
    }
};
