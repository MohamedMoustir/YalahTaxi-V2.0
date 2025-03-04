<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\trajetController;
use App\Http\Controllers\driverController;
use App\Http\Controllers\passeger_courseController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\paymentController;





use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/home', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/home', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/home', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group(function () {
Route::get('/home',[driverController::class,'index'])->name('home');
Route::get('/detiles/{id}',[driverController::class,'detiles'])->name('detiles');
Route::post('/reservations',[passeger_courseController::class,'reservations'])->name('reservations');
Route::get('/historique/{id}',[passeger_courseController::class,'gethistorique'])->name('historique');
Route::get('/refuser/{id}',[passeger_courseController::class,'refuserreservation'])->name('refuser');
Route::get('/search',[driverController::class,'index'])->name('search.taxis');

});


Route::middleware(['auth'])->group(function () {
Route::get('/admin',[trajetController::class,'index']);
Route::post('/store',[trajetController::class,'store'])->name('admin.store');
Route::get('/ditlesTrajets',[trajetController::class,'ditlesTrajets'])->name('ditlestrajets');

});

Route::middleware(['auth'])->group(function () {
Route::get('/driver',[driverController::class,'getresevation'])->name('getresevation');
Route::get('/accepter/{id}',[passeger_courseController::class,'accepterresevation'])->name('accepter');
Route::get('/annuler/{id}',[passeger_courseController::class,'annulerresevation'])->name('annuler'); 
Route::get('/disponibilites',[driverController::class,'viewdisponibilites'])->name('disponibilites');
Route::post('/disponible',[driverController::class,'disponibilites'])->name('disponible');

});

Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/google', 'googleLogin')->name('auth.google');
    Route::get('auth/google-callback', 'googleAuthentication')->name('auth.google-callback');
});

Route::post('/pay',[paymentController::class,'pay'])->name('payment');
Route::get('success', [paymentController::class,'success']);
Route::get('error', [paymentController::class,'error']);




require __DIR__.'/auth.php';
