<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartementsController;
use App\Http\Controllers\ComptesetudiantController;
use App\Http\Controllers\ComptesenseignantController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MatieresController;
use App\Http\Controllers\EtudiantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



/*Route::get('/departement2', function () {
    return view('administrateur.departement');
}); 
Route::get('/departement', 'DepartementsController@index')->name('departements'); */ 

Route::get('/deconnexion3', function () {
    session()->forget('admin');
    return redirect('connexion'); 
});

Route::group(['middleware' =>['adminAuth']],function(){
Route::get('/departement', [DepartementsController::class, 'create'])->name('departements') ; 
Route::get('/click_delete/{id}', [DepartementsController::class, 'destroy']) ;
Route::post('/ajoute_produit', [DepartementsController::class, 'store'])->name('departements.store'); 
Route::match(['put', 'patch'],'/modifier_departement/{id}', [DepartementsController::class, 'update'])->name('departements.update');
Route::get('/modifier_departement/{id}', [DepartementsController::class, 'edit']) ;


Route::get('/comptesetudiant', [ComptesetudiantController::class, 'create'])->name('comptes') ; 
Route::get('/comptesetudiantenattente', [ComptesetudiantController::class, 'create2'])->name('comptes') ;  
Route::get('/accepte_compte/{id}', [ComptesetudiantController::class, 'edit']) ;
Route::get('/click_deletecompte/{id}', [ComptesetudiantController::class, 'destroy']) ;
Route::match(['put', 'patch'],'/modifier_compteetudiant/{id}', [ComptesetudiantController::class, 'update'])->name('comptes2.update');
Route::get('/modifier_compteetudiant/{id}', [ComptesetudiantController::class, 'edit2']) ;

Route::get('/comptesensignant', [ComptesenseignantController::class, 'create'])->name('comptes') ; 
Route::get('/comptesensignantenattente', [ComptesenseignantController::class, 'create2'])->name('comptes') ;  
Route::get('/accepte_compteensignant/{id}', [ComptesenseignantController::class, 'edit']) ;
Route::get('/click_deletecompteensignant/{id}', [ComptesenseignantController::class, 'destroy']) ;
Route::match(['put', 'patch'],'/modifier_compteensignant/{id}', [ComptesenseignantController::class, 'update'])->name('comptes.update');
Route::get('/modifier_compteensignant/{id}', [ComptesenseignantController::class, 'edit2']) ;

});




//inscription et connexion 

Route::get('/connexion', function () {
    return view('connexion.login');
}); 
Route::get('/reparation', function () {
    return view('connexion.condition');
});

Route::get('/inscrire_etudiant', [DepartementsController::class, 'show'])->name('departements') ; 
Route::get('/inscrire_enseignant', [DepartementsController::class, 'show2'])->name('departements') ; 
Route::post('/ajoute_etudiant2', [ComptesetudiantController::class, 'store'])->name('etudiants22.store'); 
Route::post('/ajoute_enseignant', [ComptesenseignantController::class, 'store'])->name('enseignants.store'); 
Route::post('/connexion', [ComptesenseignantController::class, 'store2'])->name('connexion.store2'); 



//enseignant

Route::get('/deconnexion2', function () {
    session()->forget('login_enseignant');
    return redirect('connexion'); 
});

Route::group(['middleware' =>['enseignantAuth']],function(){

Route::get('/enseignant/{nom}/{prenom}/{role}/{departement}', [MatieresController::class, 'show4'])->name('matieresss') ; 
Route::get('/surveillant/{nom}/{prenom}', [MatieresController::class, 'show5'])->name('surveillantes') ; 
Route::get('/notes/{nom}/{prenom}', [MatieresController::class, 'show6'])->name('notes') ; 
Route::get('/consulter_notematiere/{matiere}/{section}/{classe}', [EtudiantController::class, 'show5'])->name('notess') ; 
Route::match(['put', 'patch'],'/modifier_notes/{id}', [EtudiantController::class, 'update2'])->name('notes.update2');

//chef de departement 
Route::get('/section', [SectionsController::class, 'create'])->name('sections') ; 
Route::get('/click_deletesection/{id}', [SectionsController::class, 'destroy']) ;
Route::post('/ajoute_section', [SectionsController::class, 'store'])->name('sections.store'); 
Route::match(['put', 'patch'],'/modifier_section/{id}', [SectionsController::class, 'update'])->name('sections.update');
Route::get('/modifier_section/{id}', [SectionsController::class, 'edit']) ;


Route::get('/consulter_classe/{nom_Section}/{departement}', [ClasseController::class, 'show'])->name('classes') ;
Route::get('/click_deleteclasse/{id}', [ClasseController::class, 'destroy']) ;
Route::post('/ajoute_classe', [ClasseController::class, 'store'])->name('classes.store') ;
Route::match(['put', 'patch'],'/modifier_classe/{id}', [ClasseController::class, 'update'])->name('classes.update');
Route::get('/modifier_classe/{id}', [ClasseController::class, 'edit']) ;


Route::get('/consulter_planification/{section}/{nom_Classe}', [MatieresController::class, 'show'])->name('matieres','comptes') ;
Route::get('/click_deletematiere/{id}', [MatieresController::class, 'destroy']) ;
Route::post('/ajoute_matiere', [MatieresController::class, 'store'])->name('matieres.store') ;
Route::match(['put', 'patch'],'/modifier_matiere/{id}', [MatieresController::class, 'update'])->name('matieres.update');
Route::get('/modifier_matiere/{id}', [MatieresController::class, 'edit']) ;


Route::get('/consulter_notes/{section}/{nom_Classe}', [MatieresController::class, 'show2'])->name('matieres') ; 

Route::get('/consulter_places/{nom_Matiere}/{nom_Section}/{nom_Classe}', [EtudiantController::class, 'show'])->name('etudiants') ; 
Route::get('/consulter_notesEtudiant/{nom_Matiere}/{nom_Section}/{nom_Classe}', [EtudiantController::class, 'show2'])->name('etudiants') ; 
Route::get('/gestion_Etudiant/{nom_Matiere}/{nom_Section}/{nom_Classe}', [EtudiantController::class, 'show6'])->name('etudiants','compteEtudiant') ; 
Route::post('/ajoute_etudiant', [EtudiantController::class, 'store'])->name('etudiants.store'); 
Route::get('/modifier_etud/{id}', [EtudiantController::class, 'edit']) ;
Route::match(['put', 'patch'],'/modifier_etud2/{id}', [EtudiantController::class, 'update3'])->name('etudiants.update3');
Route::match(['put', 'patch'],'/modifier_etudiant/{id}/{nom_Matiere}', [EtudiantController::class, 'update'])->name('etudiants.update');
Route::get('/click_deleteetud/{id}', [EtudiantController::class, 'destroy']) ; 

Route::get('/gerer_compte_enseignant/{id}', [ComptesenseignantController::class, 'edit3']) ; 
Route::match(['put', 'patch'],'/modifier_compte_enseignant/{id}', [ComptesenseignantController::class, 'update5'])->name('modifiercompteenseignant.update5');


});





//etudiant 

Route::get('/deconnexion', function () {
    session()->forget('login');
    return redirect('connexion'); 
});

Route::group(['middleware' =>['etudiantAuth']],function(){

    Route::get('/etudiant/{nom}/{prenom}/{classe}/{section}', [MatieresController::class, 'show3'])->name('matieress') ; 
    Route::get('/place/{nom}/{prenom}/{classe}/{section}', [EtudiantController::class, 'show3'])->name('places') ; 
    Route::get('/note/{nom}/{prenom}/{classe}/{section}', [EtudiantController::class, 'show4'])->name('notes') ; 
    Route::get('/gerer_compte_etudiant/{id}', [ComptesetudiantController::class, 'edit3']) ; 
    Route::match(['put', 'patch'],'/modifier_compte_etudiant2/{id}', [ComptesetudiantController::class, 'update5'])->name('modifiercompteetudiant.update5');


});