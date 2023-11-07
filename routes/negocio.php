<?php

use App\Http\Controllers\Negocio\NegocioController;
use Illuminate\Support\Facades\Route;

Route::prefix('negocio')->middleware(['auth','role:negocio'])->name('negocio.')->group(function () {

    Route::get('/informacion/{user}',[NegocioController::class,'data_filled'])->name('datafilled');
    Route::post('/informacion/{user}',[NegocioController::class,'data_complete'])->name('datacomplete');

});

Route::prefix('negocio')->middleware(['auth','data_filled','role:negocio'])->name('negocio.')->group(function () {

    Route::get('/dashboard',[NegocioController::class, 'index'])->name('dashboard');

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
