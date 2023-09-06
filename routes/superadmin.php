<?php

use App\Http\Controllers\Superadmin\AuditController;
use App\Http\Controllers\Superadmin\CategoryController;
use App\Http\Controllers\Superadmin\PublicityController;
use App\Http\Controllers\Superadmin\SubcategoryController;
use App\Http\Controllers\Superadmin\SuperadminController;
use App\Http\Controllers\Superadmin\TicketController;
use App\Http\Controllers\Superadmin\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;

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
    Route::resource('tickets',TicketController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('publicities',PublicityController::class);

    Route::get('/auditoria',[AuditController::class,'index'])->name('auditoria.index');
    Route::get('health', HealthCheckResultsController::class);

    Route::put('publicities/{publicity}/habilitar',[PublicityController::class,'habilitar'])->name('publicities.habilitar');
    Route::put('publicities/{publicity}/deshabilitar',[PublicityController::class,'deshabilitar'])->name('publicities.deshabilitar');

    Route::get('/categorias/{category}/index',[SubcategoryController::class,'index'])->name('subcategories.index');
    Route::get('/categorias/{category}/create',[SubcategoryController::class,'create'])->name('subcategories.create');
    Route::post('/categorias/{category}/store',[SubcategoryController::class,'store'])->name('subcategories.store');
    Route::get('/categorias/{category}/edit/{subcategory}',[SubcategoryController::class,'edit'])->name('subcategories.edit');
    Route::put('/categorias/{category}/update/{subcategory}',[SubcategoryController::class,'update'])->name('subcategories.update');
    Route::delete('/categorias/{category}/destroy/{subcategory}',[SubcategoryController::class,'destroy'])->name('subcategories.destroy');

    // Route::resource('categories/{category}/subcategories',CategoryController::class);

    Route::get('/clientes',[UserController::class,'clientIndex'])->name('users.clientes');
    Route::get('/negocios',[UserController::class,'negocioIndex'])->name('users.negocios');

    Route::get('/ajustes',[SuperadminController::class,'settings'])->name('ajustes');
    Route::put('/ajustes',[SuperadminController::class,'updateSettings'])->name('ajustes.update');

});

