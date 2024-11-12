<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;



Route::get('user/login', [LoginController::class, 'showLoginForm'])->name('user.login'); // Show login form
Route::post('user/login', [LoginController::class, 'login'])->name('user.login.submit'); // Process login form

// Route::get('/user/login', [HomeController::class, 'index']);

Route::get('user/login', [LoginController::class, 'index'])->name('user.login');
Route::post('user/login', [LoginController::class, 'login'])->name('user.login.submit');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
