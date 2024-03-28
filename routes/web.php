<?php

use App\Http\Controllers\Admin\AffectationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\DroitController;
use App\Http\Controllers\admin\OffreController;
use App\Http\Controllers\Admin\PosteController;
use App\Http\Controllers\Admin\AgenceController;
use App\Http\Controllers\Admin\CompteController;
use App\Http\Controllers\Admin\EnfantController;
use App\Http\Controllers\Admin\ContratController;
use App\Http\Controllers\Admin\DiplomeController;
use App\Http\Controllers\Admin\FormuleController;
use App\Http\Controllers\Admin\PeriodeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\BulletinController;
use App\Http\Controllers\Admin\CandidatController;
use App\Http\Controllers\Admin\RubriqueController;
use App\Http\Controllers\Admin\TypePretController;
use App\Http\Controllers\Admin\VariableController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\admin\FormateurController;
use App\Http\Controllers\admin\FormationController;
use App\Http\Controllers\Admin\PostulantController;
use App\Http\Controllers\Admin\TypeCongeController;
use App\Http\Controllers\Auth\LoginAgentController;
use App\Http\Controllers\Admin\ConventionController;
use App\Http\Controllers\admin\GenerationController;
use App\Http\Controllers\Admin\CentreImpotController;
use App\Http\Controllers\Admin\DepartementController;
use App\Http\Controllers\Admin\TypeContratController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\admin\TypeFormationController;
use App\Http\Controllers\Admin\ClassificationController;
use App\Http\Controllers\Admin\FeuilleCalculeController;
use App\Http\Controllers\Admin\StagiaireController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Agent\DashboardAgentController;
use App\Http\Controllers\Frontend\AuthFrontendController;
use App\Http\Controllers\Frontend\OffreFrontendController;
use App\Http\Controllers\Frontend\RegisterFrontendController;
use App\Http\Controllers\Candidat\CandidatDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(FrontendController::class)->group(function(){
    Route::get('/','index');
});

Route::controller(RegisterFrontendController::class)->group(function(){
    Route::get('register-candidat','index');
});

Route::controller(AuthFrontendController::class)->group(function () {
    Route::get('login-candidat', 'index')->name('login-candidat');
    Route::post('login-candidat', 'autenticate');
});

Route::controller(AuthFrontendController::class)->middleware(['middleware' => "candidat"])->group(function () {
    Route::get('logout-candidat','logout');
});

// Offre Frontend Cnntroller
Route::controller(OffreFrontendController::class)->group(function () {
    Route::get('offres','index');
    Route::get('offres/{titre}', 'detail');
});
// Route Authentifcation Agents
Route::group(['middleware' => 'agent.guest'], function () {
    // Vos routes de connexion pour les agents ici
    Route::get('/login-agent', [LoginAgentController::class, 'index']);
    Route::post('/login-agent', [LoginAgentController::class, 'login'])->name('agent-login');
});


Route::middleware(['auth:webagent'])->group(function () {
    // Routes sécurisées pour les agents
    Route::controller(DashboardAgentController::class)->group(function () {
        Route::get('agent-dashboard', 'index')->name('agent-dashboard');
        Route::get('agent-logout', 'logout')->name('agent-logout');
    });
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::controller(DepartementController::class)->group(function(){
        Route::get('departements','index')->name('departement.index');
    });

    Route::controller(PosteController::class)->group(function () {
        Route::get('postes', 'index')->name('poste.index');
    });

    Route::controller(UserManagementController::class)->group(function(){
        Route::get('usersManagements','index')->name('user.index');
    });

    Route::controller(RoleController::class)->group(function(){
        Route::get('roles','index')->name('role.index');
        Route::post('roles/store', 'store')->name('role.store');
        Route::post('/getDroit', 'getDroit');
        Route::post('/exceptDroit', 'exceptDroit');
        Route::post('roles/update', 'update')->name('role.update');
        Route::post('roles/delet', 'destroy')->name('role.delete');
    });

    Route::controller(DroitController::class)->group(function(){
        Route::get('droits','index')->name('droit.index');
    });

    Route::controller(AgentController::class)->group(function(){
        Route::get('agents','index')->name('agent.index');
        Route::get('agents/create', 'create')->name('agent.create');
        Route::get('agents/{matricule}/detail', 'detail')->name('agent.detail');
    });

    Route::controller(TypeContratController::class)->group(function () {
        Route::get('type-contrats', 'index')->name('Typecontrat.index');
    });

    Route::controller(TypeCongeController::class)->group(function () {
        Route::get('type-conges', 'index')->name('Typeconge.index');
    });

    Route::controller(TypePretController::class)->group(function () {
        Route::get('type-prets', 'index')->name('Typepret.index');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profiles', 'index')->name('profile');
        Route::post('updateprofiles', 'updateprofile')->name('updateprofile');
    });

    Route::controller(CentreImpotController::class)->group(function () {
        Route::get('centres-impots', 'index')->name('centreImpot.index');
    });

    Route::controller(FeuilleCalculeController::class)->group(function () {
        Route::get('feuille-calcules', 'index')->name('feuille-calcule.index');
    });


    Route::controller(RubriqueController::class)->group(function () {
        Route::get('rubriques', 'index')->name('rubrique.index');
    });

    Route::controller(PeriodeController::class)->group(function () {
        Route::get('periodes', 'index')->name('periode.index');
    });

    Route::controller(BulletinController::class)->group(function () {
        Route::get('bulletins', 'index')->name('bulletin.index');
    });


    Route::controller(ContratController::class)->group(function () {
        Route::get('contrats', 'index')->name('contrat.index');
    });

    // Classification Route
    Route::controller(ClassificationController::class)->group(function () {
        Route::get('classifications','index')->name('classification.index');
    });

    Route::controller(DiplomeController::class)->group(function () {
        Route::get('diplomes', 'index')->name('diplome.index');
    });
    Route::controller(AgenceController::class)->group(function () {
        Route::get('agences', 'index')->name('agence.index');
    });

    Route::controller(EnfantController::class)->group(function () {
        Route::get('enfants', 'index')->name('enfant.index');
    });


    Route::controller(GenerationController::class)->group(function () {
        Route::get('generations', 'index')->name('generation.index');
    });

    Route::controller(CategorieController::class)->group(function () {
        Route::get('categories', 'index')->name('categorie.index');
    });

    Route::controller(OffreController::class)->group(function () {
        Route::get('offres', 'index')->name('offre.index');
        Route::get('offres/create', 'create');
        Route::post('offres/create', 'store')->name('offre.store');
        Route::get('offres/{id}/edit','edit');
        Route::post('offres/{id}/edit', 'update');
    });

    Route::controller(CandidatController::class)->group(function () {
        Route::get('candidats', 'index')->name('candidat.index');
    });

    Route::controller(PostulantController::class)->group(function () {
        Route::get('postulants', 'index')->name('postulant.index');
    });

    Route::controller(FormateurController::class)->group(function () {
        Route::get('formateurs', 'index')->name('formateur.index');
    });

    Route::controller(TypeFormationController::class)->group(function () {
        Route::get('type-formations', 'index')->name('typeformation.index');
    });

    Route::controller(FormationController::class)->group(function () {
        Route::get('formations', 'index')->name('formation.index');
        Route::get('formations/create','create')->name('formation.create');
    });

    Route::controller(StagiaireController::class)->group(function () {
        Route::get('stagiaires', 'index')->name('stagiaire.index');
        Route::get('convention/{matricule}','generation');
        Route::get('attestation/{matricule}', 'generationAttestation');
    });

    Route::controller(AffectationController::class)->group(function () {
        Route::get('affectations', 'index')->name('affectation.index');
    });
});

// Candidat Dashboard
Route::prefix('candidat')->middleware(['middleware' => "candidat"])->group(function()
{
    Route::controller(CandidatDashboardController::class)->group(function () {
        Route::get('dashboard', 'index');
    });
});

