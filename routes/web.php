<?php

use App\Http\Controllers\Admin\AgenceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\DroitController;
use App\Http\Controllers\Admin\PosteController;
use App\Http\Controllers\Admin\ContratController;
use App\Http\Controllers\Admin\DiplomeController;
use App\Http\Controllers\Admin\PeriodeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\BulletinController;
use App\Http\Controllers\Admin\RubriqueController;
use App\Http\Controllers\Admin\TypePretController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\TypeCongeController;
use App\Http\Controllers\Auth\LoginAgentController;
use App\Http\Controllers\Admin\ConventionController;
use App\Http\Controllers\Admin\CentreImpotController;
use App\Http\Controllers\Admin\DepartementController;
use App\Http\Controllers\Admin\TypeContratController;
use App\Http\Controllers\Admin\ClassificationController;
use App\Http\Controllers\Admin\CompteController;
use App\Http\Controllers\Admin\FeuilleCalculeController;
use App\Http\Controllers\Admin\FormuleController;
use App\Http\Controllers\Admin\NatureRubriqueController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\VariableController;
use App\Http\Controllers\Agent\DashboardAgentController;

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

// Route Authentifcation Agents
Route::middleware(['guest'])->group(function () {
    // Routes accessibles uniquement pour les utilisateurs invités (non authentifiés)
    Route::get('/', [LoginAgentController::class, 'index']);
    Route::post('/', [LoginAgentController::class, 'login'])->name('agent-login');
});

Route::middleware(['auth:webagent'])->group(function () {
    // Routes sécurisées pour les agents
    Route::controller(DashboardAgentController::class)->group(function () {
        Route::get('agent-dashboard', 'index')->name('agent-dashboard');
        Route::get('agent-logout', 'logout')->name('agent-logout');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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

    Route::controller(NatureRubriqueController::class)->group(function () {
        Route::get('natures-rubriques', 'index')->name('nature-rubrique.index');
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
        Route::get('contrats/create', 'create');
        Route::get('contrats/create/{numero}/edit', 'edit')->name('contrat.edit');
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

    Route::controller(VariableController::class)->group(function () {
        Route::get('variables', 'index')->name('variable.index');
    });

    Route::controller(FormuleController::class)->group(function () {
        Route::get('formules', 'index')->name('formule.index');
    });

    Route::controller(CompteController::class)->group(function () {
        Route::get('comptes','index')->name('compte.index');
    });
});

