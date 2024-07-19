<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserAdminController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Employe\EmployeController;
use App\Http\Controllers\Employe\GenreController;
use App\Http\Controllers\Employe\MatrimonialController;
use App\Http\Controllers\Employe\DomineController;
use App\Http\Controllers\Employe\NiveauController;
use App\Http\Controllers\Employe\DiplomeController;
use App\Http\Controllers\Employe\TypeContratController;
use App\Http\Controllers\Employe\DirectionController;
use App\Http\Controllers\Employe\ServiceController;
use App\Http\Controllers\Employe\AntenneController;
use App\Http\Controllers\Employe\BureauController;
use App\Http\Controllers\Employe\PosteController;

// Route::get('/dashboard',[UserAdminController::class,'dashboard'])->name('dashboard');
// Route::get('/',[UserAdminController::class, 'login'])->name('login');
Route::get('/',[WebsiteController::class, 'index'])->name('welcome');

Route::get('/validate-account/{email}',[UserAdminController::class,'accessdefine'])->name('validate-account');
Route::post('/validate-account/{email}',[UserAdminController::class, 'submitaccessdefine'])->name('submitaccessdefine');
// Route::get('/login',[UserAdminController::class, 'login'])->name('login');

Route::middleware('guest')->group(function(){
  Route::get('/login',[UserAdminController::class, 'login'])->name('login');
  Route::post('/handlogin',[UserAdminController::class,'handlogin'])->name('handlogin');
});
Route::middleware('auth')->group(function(){
    Route::get('/deconnexion',[UserAdminController::class,'deconnexion'])->name('deconnexion');
    Route::get('/dashboard', function () {
        return view('bienvenue');
    })->name('dashboard');

});

Route::middleware('auth')->group(function(){

    Route::prefix('user')->group(function(){
        Route::get('/listeregister',[UserAdminController::class,'list_register'])->name('listregister');
        Route::get('/edit/{user}',[UserAdminController::class,'edit'])->name('editer');
        Route::put('/update/{user}',[UserAdminController::class,'update'])->name('update');
        Route::get('/delete/{user}',[UserAdminController::class,'delete'])->name('delete');

        Route::get('/register',[UserAdminController::class,'register'])->name('register');
        Route::post('/handleregister',[UserAdminController::class,'handleregister'])->name('handleregister');

        Route::get('/profil_user/{user}', [UserAdminController::class,'user_profil'])->name('profil_user');
        Route::put('/profil/{user}',[UserAdminController::class, 'profil_user'])->name('user.profil');

    });
    Route::prefix('employe')->group(function(){
        Route::get('/create',[EmployeController::class, 'create'])->name('employe.create');
        Route::get('/liste',[EmployeController::class, 'liste'])->name('employe.liste');
        Route::get('/edit/{employe}',[EmployeController::class, 'editer'])->name('employe.editer');
        Route::get('/delete_photo/{employe}',[EmployeController::class, 'editer'])->name('employe.editer');
        Route::get('/detail/{employe}',[EmployeController::class,'detail'])->name('employe.detail');
        Route::get('delete/{employe}',[EmployeController::class,'delete'])->name('employe.delete');

    });
    Route::prefix('genre')->group(function(){
        Route::get('/create',[GenreController::class, 'create'])->name('genre.create');
        Route::post('/create',[GenreController::class, 'store'])->name('genre.store');
        Route::get('/liste',[GenreController::class, 'liste'])->name('genre.liste');
        Route::get('/edit/{genre}',[GenreController::class, 'editer'])->name('genre.editer');
        Route::put('/update/{genre}',[GenreController::class, 'update'])->name('genre.update');
        Route::get('/delete/{genre}',[GenreController::class, 'delete'])->name('genre.delete');

        // Route::get('/edit/{genre}',[GenreController::class, 'create'])->name('genre.create');
    });
    Route::prefix('matrimonial')->group(function(){
        Route::get('/create',[MatrimonialController::class, 'create'])->name('matrimonial.create');
        Route::post('/create',[MatrimonialController::class, 'store'])->name('matrimonial.store');
        Route::get('/liste',[MatrimonialController::class, 'liste'])->name('matrimonial.liste');
        Route::get('/edit/{matrimonial}',[MatrimonialController::class, 'editer'])->name('matrimonial.editer');
        Route::put('/update/{matrimonial}',[MatrimonialController::class, 'update'])->name('matrimonial.update');
        Route::get('/delete/{matrimonial}',[MatrimonialController::class, 'delete'])->name('matrimonial.delete');
    });
    Route::prefix('domaine')->group(function(){
        Route::get('create',[DomineController::class, 'create'])->name('domaine.create');
        Route::post('/create',[DomineController::class, 'store'])->name('domaine.store');
        Route::get('/liste',[DomineController::class, 'liste'])->name('domaine.liste');
        Route::get('/edit/{domaine}',[DomineController::class, 'editer'])->name('domaine.editer');
        Route::put('/update/{domaine}',[DomineController::class, 'update'])->name('domaine.update');
        Route::get('/delete/{domaine}',[DomineController::class, 'delete'])->name('domaine.delete');
    });
    Route::prefix('niveau')->group(function(){
        Route::get('create',[NiveauController::class,'create'])->name('niveau.create');
        Route::post('/create',[NiveauController::class, 'store'])->name('niveau.store');
        Route::get('/liste',[NiveauController::class, 'liste'])->name('niveau.liste');
        Route::get('/edit/{niveau}',[NiveauController::class, 'editer'])->name('niveau.editer');
        Route::put('/update/{niveau}',[NiveauController::class, 'update'])->name('niveau.update');
        Route::get('/delete/{niveau}',[NiveauController::class, 'delete'])->name('niveau.delete');
    });
    Route::prefix('diplome')->group(function(){
        Route::get('create',[DiplomeController::class, 'create'])->name('diplome.create');
        Route::post('/create',[DiplomeController::class, 'store'])->name('diplome.store');
        Route::get('/liste',[DiplomeController::class, 'liste'])->name('diplome.liste');
        Route::get('/edit/{diplome}',[DiplomeController::class, 'editer'])->name('diplome.editer');
        Route::put('/update/{diplome}',[DiplomeController::class, 'update'])->name('diplome.update');
        Route::get('/delete/{diplome}',[DiplomeController::class, 'delete'])->name('diplome.delete');
    });
    Route::prefix('contrat')->group(function(){
        Route::get('create',[TypeContratController::class,'create'])->name('contrat.create');
        Route::post('/create',[TypeContratController::class, 'store'])->name('contrat.store');
        Route::get('/liste',[TypeContratController::class, 'liste'])->name('contrat.liste');
        Route::get('/edit/{contrat}',[TypeContratController::class, 'editer'])->name('contrat.editer');
        Route::put('/update/{contrat}',[TypeContratController::class, 'update'])->name('contrat.update');
        Route::get('/delete/{contrat}',[TypeContratController::class, 'delete'])->name('contrat.delete');
    });
    Route::prefix('direction')->group(function(){
        Route::get('create',[DirectionController::class,'create'])->name('direction.create');
        Route::post('/create',[DirectionController::class, 'store'])->name('direction.store');
        Route::get('/liste',[DirectionController::class, 'liste'])->name('direction.liste');
        Route::get('/edit/{direction}',[DirectionController::class, 'editer'])->name('direction.editer');
        Route::put('/update/{direction}',[DirectionController::class, 'update'])->name('direction.update');
        Route::get('/delete/{direction}',[DirectionController::class, 'delete'])->name('direction.delete');
    });
    Route::prefix('service')->group(function(){
        Route::get('create',[ServiceController::class, 'create'])->name('service.create');
        Route::post('/create',[ServiceController::class, 'store'])->name('service.store');
        Route::get('/liste',[ServiceController::class, 'liste'])->name('service.liste');
        Route::get('/edit/{service}',[ServiceController::class, 'editer'])->name('service.editer');
        Route::put('/update/{service}',[ServiceController::class, 'update'])->name('service.update');
        Route::get('/delete/{service}',[ServiceController::class, 'delete'])->name('service.delete');
    });
    Route::prefix('antenne')->group(function(){
        Route::get('create',[AntenneController::class,'create'])->name('antenne.create');
        Route::post('/create',[AntenneController::class, 'store'])->name('antenne.store');
        Route::get('/liste',[AntenneController::class, 'liste'])->name('antenne.liste');
        Route::get('/edit/{antenne}',[AntenneController::class, 'editer'])->name('antenne.editer');
        Route::put('/update/{antenne}',[AntenneController::class, 'update'])->name('antenne.update');
        Route::get('/delete/{antenne}',[AntenneController::class, 'delete'])->name('antenne.delete');
    });
    Route::prefix('bureau')->group(function(){
        Route::get('/create',[BureauController::class, 'create'])->name('bureau.create');
        Route::post('/create',[BureauController::class, 'store'])->name('bureau.store');
        Route::get('/liste',[BureauController::class, 'liste'])->name('bureau.liste');
        Route::get('/edit/{bureau}',[BureauController::class, 'editer'])->name('bureau.editer');
        Route::put('/update/{bureau}',[BureauController::class, 'update'])->name('bureau.update');
        Route::get('/delete/{bureau}',[BureauController::class, 'delete'])->name('bureau.delete');
    });
    Route::prefix('poste')->group(function(){
        Route::get('create',[PosteController::class, 'create'])->name('poste.create');
        Route::post('/create',[PosteController::class, 'store'])->name('poste.store');
        Route::get('/liste',[PosteController::class, 'liste'])->name('poste.liste');
        Route::get('/edit/{poste}',[PosteController::class, 'editer'])->name('poste.editer');
        Route::put('/update/{poste}',[PosteController::class, 'update'])->name('poste.update');
        Route::get('/delete/{poste}',[PosteController::class, 'delete'])->name('poste.delete');
    });

});




