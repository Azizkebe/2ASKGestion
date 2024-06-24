<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function(){
    Route::get('/register',[UserAdminController::class,'register'])->name('register');
    Route::post('/handleregister',[UserAdminController::class,'handleregister'])->name('handleregister');
});
