<?php

use App\Http\Controllers\Negocio\NegocioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RedirectController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PublicController::class,'index'])->name('public.index');

Route::get('/dashboard',[RedirectController::class, 'toDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('negocio')->middleware(['auth','role:negocio'])->name('negocio.')->group(function () {

    Route::get('/informacion/{user}',[NegocioController::class,'data_filled'])->name('datafilled');
    Route::post('/informacion/{user}',[NegocioController::class,'data_complete'])->name('datacomplete');

});

Route::prefix('negocio')->middleware(['auth','data_filled','role:negocio'])->name('negocio.')->group(function () {

    Route::get('/dashboard',[NegocioController::class, 'index'])->name('dashboard');

});

require __DIR__.'/auth.php';
require __DIR__.'/superadmin.php';
