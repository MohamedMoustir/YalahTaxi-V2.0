<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\trajetController;
use App\Http\Controllers\driverController;
use App\Http\Controllers\passeger_courseController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Commentcontroller;
use App\Http\Controllers\ChatController;
use App\Events\sendDriveerMassege;
use App\Http\Controllers\SendQrCodeMailController;
use App\Http\Middleware\RoleMiddleware;






use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/home', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/home', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {
    Route::get('/home', [driverController::class, 'index'])->name('home');
    Route::get('/detiles/{id}', [driverController::class, 'detiles'])->name('detiles');
    Route::post('/reservations', [passeger_courseController::class, 'reservations'])->name('reservations');
    Route::get('/historique/{id}', [passeger_courseController::class, 'gethistorique'])->name('historique');
    Route::get('/refuser/{id}', [passeger_courseController::class, 'refuserreservation'])->name('refuser');
    Route::get('/search', [driverController::class, 'index'])->name('search.taxis');

    Route::post('/Comment', [Commentcontroller::class, 'poster'])->name('comment.poster');
    // Route::get('Comment/detaile/{id}', [CommentController::class, 'show'])->name('annonce.show');
    // Route::get('/Comment/index', [CommentController::class, 'index'])->name('Comment.index');
    Route::delete('/Comment/delete/{id}', [commentController::class, 'delete'])->name('comment.delete');
    Route::get('/edit/{id}', [commentController::class, 'edit'])->name('comment.edit');
    Route::post('/Comment/update/{id}', [commentController::class, 'update'])->name('comment.update');


});


Route::middleware('auth')->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/store', [trajetController::class, 'store'])->name('admin.store');
    Route::get('/ditlesTrajets', [trajetController::class, 'ditlesTrajets'])->name('ditlestrajets');
    Route::get('/users', [AdminController::class, 'getUsers'])->name('admin.users');
    Route::get('/delete/{id}', [AdminController::class, 'deleteUsers'])->name('admin.delete');
    Route::get('/trajet', [AdminController::class, 'Gestion_des_trajets'])->name('ditlestrajets');
    Route::get('/deletetrajet/{id}', [AdminController::class, 'deletetrajet'])->name('admin.deletetrajet');
    Route::get('/editetrajet/{id}', [AdminController::class, 'editetrajet'])->name('admin.editetrajet');
    Route::post('/update', [AdminController::class, 'updateTrajet'])->name('admin.update');
    Route::get('/user/{id}/toggle-suspend', [AdminController::class, 'toggleSuspend'])->name('admin.toggleSuspend');

});

Route::middleware('auth')->group(function () {
    Route::get('/driver', [driverController::class, 'getresevation'])->name('getresevation');
    Route::get('/accepter/{id}', [passeger_courseController::class, 'accepterresevation'])->name('accepter');
    Route::get('/annuler/{id}', [passeger_courseController::class, 'annulerresevation'])->name('annuler');
    Route::get('/disponibilites', [driverController::class, 'viewdisponibilites'])->name('disponibilites');
    Route::post('/disponible', [driverController::class, 'disponibilites'])->name('disponible');

});

Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/google', 'googleLogin')->name('auth.google');
    Route::get('auth/google-callback', 'googleAuthentication')->name('auth.google-callback');
});

Route::post('/pay', [paymentController::class, 'pay'])->name('payment');
Route::get('success', [paymentController::class, 'success']);
Route::get('error', [paymentController::class, 'error']);



Route::middleware('auth')->group(function () {


    // Route::get('/driver/fetch-messages', [driverController::class, 'fetchMessages'])->name('admin.fetchMessages');
    // Route::post('/driver/send-message', [driverController::class, 'sendMessage'])->name('driver.sendMessage');

    // Route::get('/user/chats/{id}', [ChatController::class, 'fetchMessagesFromUserToAdmin'])->name('user.chats');
    // Route::post('/user/chats/{id}', [ChatController::class, 'sendMessageFromUserToAdmin'])->name('user.chats');

    // Route::get('/admin/chats', [DriverController::class, 'chats'])->name('admin.chats');

    // Route::get('/user/chats/{id}', [passeger_courseController::class, 'chats'])->name('user.chats');




    
    Route::get('/user/chats/{id}', [ChatController::class, 'chatform'])->name('user.chats');
    Route::post('/user/chats/{id}', [ChatController::class, 'submit'])->name('user.chat');
    Route::get('/user/chats/{id}', [ChatController::class, 'mount'])->name('user.chat');
    Route::post('/driver/chats/{id}', [ChatController::class, 'chatform'])->name('chat');


    // Route::get('/user//chats/{id}', [driverController::class, 'chatform'])->name('user.chats');
    // Route::post('/user/chats/{id}', [driverController::class, 'submit'])->name('user.chat');



    // Route::get('/send-qrcode', [SendQrCodeMailController::class, 'sendQrCodeEmail'])->middleware('auth');

    // Route::middleware('auth')->group(function(){
    //     Route::get('chat', function(){
    //         return view('chats');
    //     })->name('chat');
    // });

});


require __DIR__ . '/auth.php';
