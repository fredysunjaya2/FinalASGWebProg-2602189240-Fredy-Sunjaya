<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
