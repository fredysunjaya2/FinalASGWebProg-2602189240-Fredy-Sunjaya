<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

Route::get('/payment', function() {
    if(Auth::check()) {
        if(Auth::user()->isPaid) {
            return redirect()->route('dashboard');
        } else {
            return view('payment');
        }
    } else {
        return redirect()->route('login');
    }

})->name('payment');

Route::post('/success-payment', [UserController::class, 'updatePaid'])->name('success-payment');

Route::middleware(['auth', 'paid'])->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/wishlist', [FriendController::class, 'friendRequestIndex'])->name('wishlist');
    Route::get('/friend', [FriendController::class, 'friendIndex'])->name('friend');
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
    Route::get('/message/{id}', [MessageController::class, 'index'])->name('message');
    Route::get('/change-locale/{locale}', [UserController::class, 'changeLocale'])->name('change-locale');
    Route::get('/topup', [UserController::class, 'topup'])->name('topup');

    Route::post('/update-coin', [UserController::class, 'updateCoin'])->name('update-coin');
    Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('send-message');
    Route::post('/send-friend-request', [FriendController::class, 'sendFriendRequest'])->name('send-friend-request');
    Route::post('/accept-friend-request', [FriendController::class, 'acceptFriendRequest'])->name('accept-friend-request');
    Route::post('/decline-friend-request', [FriendController::class, 'declineFriendRequest'])->name('decline-friend-request');
});

require __DIR__.'/auth.php';
