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
                'nom' => 'Agences',
                'acces' => 1,
                'route' => 'agence.index',
                'type_droit_id' => 1,
            ],
            [
                'nom' => 'Departements',
                'acces' => 1,
                'route' => 'departement.index',
                'type_droit_id' => 1,
            ],
            [
                'nom' => 'Postes',
                'acces' => 1,
                'route' => 'poste.index',
                'type_droit_id' => 1,
            ],
            [
                'nom' => 'Classification',
                'acces' => 1,
                'route' => 'classification.index',
                'type_droit_id' => 1,
            ],
            [
                'nom' => 'Diplome',
                'acces' => 1,
                'route' => 'diplome.index',
                'type_droit_id' => 1,
            ],
            [
                'nom' => 'Agents',
                'acces' => 1,
                'route' => 'agent.index',
                'type_droit_id' => 1,
            ],
            [
                'nom' => 'Enfants',
                'acces' => 1,
                'route' => 'enfant.index',
                'type_droit_id' => 1,
            ],
            [
                'nom' => 'Type Contrat',
                'acces' => 1,
                'route' => 'Typecontrat.index',
                'type_droit_id' => 1,
            ],
            [
                'nom' => 'Contrat',
                'acces' => 1,
                'route' => 'contrat.index',
                'type_droit_id' => 1,
            ],
            [
                'nom' => 'Centre Impot',
                'acces' => 1,
                'route' => 'centreImpot.index',
                'type_droit_id' => 2,
            ],
            [
                'nom' => 'Rubrique',
                'acces' => 1,
                'route' => 'rubrique.index',
                'type_droit_id' => 2,
            ],
            [
                'nom' => 'Feuille de Calcule',
                'acces' => 1,
                'route' => 'feuille-calcule.index',
                'type_droit_id' => 2,
            ],
            [
                'nom' => 'Periode',
                'acces' => 1,
                'route' => 'periode.index',
                'type_droit_id' => 2,
            ],
            [
                'nom' => 'Bulletin',
                'acces' => 1,
                'route' => 'bulletin.index',
                'type_droit_id' => 2,
            ],
            [
                'nom' => 'Generation',
                'acces' => 1,
                'route' => 'generation.index',
                'type_droit_id' => 2,
            ],
            [
                'nom' => 'Type Pret',
                'acces' => 1,
                'route' => 'Typepret.index',
                'type_droit_id' => 5,
            ],
            [
                'nom' => 'Type Conge',
                'acces' => 1,
                'route' => 'Typeconge.index',
                'type_droit_id' => 6,
            ],
            [
                'nom' => 'Roles',
                'acces' => 1,
                'route' => 'role.index',
                'type_droit_id' => 7,
            ],
            [
                'nom' => 'Permissions',
                'acces' => 1,
                'route' => 'droit.index',
                'type_droit_id' => 7,
            ],
            [
                'nom' => 'Utilisateurs',
                'acces' => 1,
                'route' => 'user.index',
                'type_droit_id' => 7,
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
