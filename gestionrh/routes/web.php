<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/validate-account/{email}',[UserAdminController::class,'accessdefine'])->name('validate-account');
Route::post('/validate-account/{email}',[UserAdminController::class, 'submitaccessdefine'])->name('submitaccessdefine');

Route::prefix('user')->group(function(){
    Route::get('/register',[UserAdminController::class,'register'])->name('register');
    Route::post('/handleregister',[UserAdminController::class,'handleregister'])->name('handleregister');
    Route::get('/listeregister',[UserAdminController::class,'list_register'])->name('listregister');
    Route::get('/edit/{user}',[UserAdminController::class,'edit'])->name('editer');
    Route::put('/update/{user}',[UserAdminController::class,'update'])->name('update');
    Route::get('/delete/{user}',[UserAdminController::class,'delete'])->name('delete');
});
