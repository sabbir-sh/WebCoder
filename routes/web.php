<?php

use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PrivacyPolicyController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\UserController;

//Home Page
Route::get("/", [HomeController::class,"index"])->name("home");

//About Us Page
Route::get("/about", [AboutUsController::class,"about"])->name("about");

//Contact Us page
Route::get("/contact", [ContactUsController::class,"contact"])->name("contact");

//Privacy Policy
Route::get("/privacy&policy", [PrivacyPolicyController::class,"PrivacyPolicy"])->name("Privacy.Policy");

// Services
Route::get("/services", [ServicesController::class,"services"])->name("services");








Route::get('/user/login', [CustomAuthController::class, 'login'])->name('login');
Route::get('/user/register', [CustomAuthController::class, 'register'])->name('register');
Route::post('/user/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/user/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');

Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logOut')->middleware('auth');

Route::group(['middleware'=> 'auth'], function(){
    Route::get('admin/dashboard', [CustomAuthController::class, 'dashboard'])->name('adminDashboard');
    Route::get('/user/list', [CustomAuthController::class, 'userList'])->name('listOfUser');



    Route::get('/users/{id}/edit', [CustomAuthController::class, 'edit'])->name('sabbir.edit'); // Edit user
    Route::get('/users/{id}/view', [CustomAuthController::class, 'view'])->name('sabbir.view'); // Edit user
    Route::put('/users/{id}', [CustomAuthController::class, 'update'])->name('sabbir.update'); // Update user
    Route::delete('/users/{id}', [CustomAuthController::class, 'destroy'])->name('sabbir.destroy');

    Route::get('/user/create', [CustomAuthController::class, 'create'])->name('user.create');
    Route::post('/user/store', [CustomAuthController::class, 'store'])->name('user.store');

    Route::get('/forgot-password', [CustomAuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
    Route::post('/forgot-password', [CustomAuthController::class, 'handleForgotPassword'])->name('handle-forgot-password');

    Route::get('/reset-password', [CustomAuthController::class, 'showResetPasswordForm'])->name('reset-password');
    Route::post('/reset-password', [CustomAuthController::class, 'resetPassword'])->name('handle-reset-password');



});




//dashboard



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
