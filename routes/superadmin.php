<?php

use App\Http\Controllers\Superadmin\SuperadminController;
use App\Http\Controllers\Superadmin\UserController;
use Illuminate\Support\Facades\Route;

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


Route::prefix('superadmin')->middleware(['auth', 'role:superadmin'])->name('superadmin.')->group(function () {

    Route::get('/dashboard',[SuperadminController::class, 'index'])->name('dashboard');

    Route::resource('users',UserController::class);

    Route::get('/clientes',[UserController::class,'clientIndex'])->name('users.clientes');
    Route::get('/negocios',[UserController::class,'negocioIndex'])->name('users.negocios');



});

