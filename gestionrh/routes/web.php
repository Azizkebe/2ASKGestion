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
    });
    Route::prefix('niveau')->group(function(){
        Route::get('create',[NiveauController::class,'create'])->name('niveau.create');
    });
    Route::prefix('diplome')->group(function(){
        Route::get('create',[DiplomeController::class, 'create'])->name('diplome.create');
    });
    Route::prefix('contrat')->group(function(){
        Route::get('create',[TypeContratController::class,'create'])->name('contrat.create');
    });
    Route::prefix('direction')->group(function(){
        Route::get('create',[DirectionController::class,'create'])->name('direction.create');
    });
    Route::prefix('service')->group(function(){
        Route::get('create',[ServiceController::class, 'create'])->name('service.create');
    });
    Route::prefix('antenne')->group(function(){
        Route::get('create',[AntenneController::class,'create'])->name('antenne.create');
    });
    Route::prefix('bureau')->group(function(){
        Route::get('create',[BureauController::class, 'create'])->name('bureau.create');
    });
    Route::prefix('poste')->group(function(){
        Route::get('create',[PosteController::class, 'create'])->name('poste.create');
    });

});




