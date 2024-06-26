<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserAdminController;
use App\Http\Controllers\WebsiteController;

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

});

Route::middleware('auth')->group(function(){

    Route::prefix('user')->group(function(){
        Route::get('/listeregister',[UserAdminController::class,'list_register'])->name('listregister');
        Route::get('/edit/{user}',[UserAdminController::class,'edit'])->name('editer');
        Route::put('/update/{user}',[UserAdminController::class,'update'])->name('update');
        Route::get('/delete/{user}',[UserAdminController::class,'delete'])->name('delete');

        Route::get('/register',[UserAdminController::class,'register'])->name('register');
        Route::post('/handleregister',[UserAdminController::class,'handleregister'])->name('handleregister');


    });
});




