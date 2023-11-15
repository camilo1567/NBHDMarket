<?php

use App\Http\Controllers\Negocio\ImagenController;
use App\Http\Controllers\Negocio\NegocioController;
use App\Http\Controllers\Negocio\ProductController;
use App\Http\Controllers\Negocio\TicketController;
use Illuminate\Support\Facades\Route;

Route::prefix('negocio')->middleware(['auth','role:negocio'])->name('negocio.')->group(function () {

    Route::get('/informacion/{user}',[NegocioController::class,'data_filled'])->name('datafilled');
    Route::post('/informacion/{user}',[NegocioController::class,'data_complete'])->name('datacomplete');

});

Route::prefix('negocio')->middleware(['auth','data_filled','role:negocio'])->name('negocio.')->group(function () {

    Route::resource('products',ProductController::class);
    Route::resource('tickets', TicketController::class);

    Route::get('/dashboard',[NegocioController::class, 'index'])->name('dashboard');
    Route::post('/imagenes', [ProductController::class, 'storeImagen'])->name('imagen.storeImagen');

    Route::get('/ajustes',[NegocioController::class,'settings'])->name('ajustes');
    Route::put('/ajustes',[NegocioController::class,'updateSettings'])->name('ajustes.update');
});

/*

correo -> password ????????

migracion para usuario, attemps -> integer -> default 0, time_recuperacion, tiempo_limite;
tiempo_limite = Carbon::now()->addMinutes(30);
tiempo_recuperacion = Carbon::now();


if(tiempo_recuperacion > tiempo_limite){
    $user->attemps = 0;
    $user->save();
}

if(attemps == 3){

}

*/

