<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;

Route::get('/',function(){
    return view('welcome');
});


Route::get('/user/login', [CustomAuthController::class, 'login'])->name('login');
Route::get('/user/register', [CustomAuthController::class, 'register'])->name('register');
Route::post('/user/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/user/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');

Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logOut')->middleware('auth');

Route::group(['middleware'=> 'auth'], function(){
    Route::get('admin/dashboard', [CustomAuthController::class, 'dashboard'])->name('adminDashboard');
    Route::get('/user/list', [CustomAuthController::class, 'userList'])->name('listOfUser');



    Route::get('/users/{id}/edit', [CustomAuthController::class, 'edit'])->name('users.edit'); // Edit user
    Route::put('/users/{id}', [CustomAuthController::class, 'update'])->name('users.update'); // Update user
    Route::delete('/users/{id}', [CustomAuthController::class, 'destroy'])->name('users.destroy');

});




//dashboard



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';
