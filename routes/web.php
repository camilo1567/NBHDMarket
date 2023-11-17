<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChatController;
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

    Route::get('/react', function () {
        return view('react.app');
    });

    Route::get('/csrf-token', function () {
        return csrf_token();
    });

    Route::get('/api/user', [ChatController::class, 'user'])->name('chat.user');
    Route::get('/api/users', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/send', [ChatController::class, 'message'])->name('chat.message');
    Route::get('/messages/{id}', [ChatController::class, 'getMessages'])->name('chat.getMessages');

});

Route::get('/about', [AboutController::class, 'index'])->name('elements.about');

require __DIR__.'/auth.php';
require __DIR__.'/superadmin.php';
require __DIR__.'/negocio.php';

