<?php

use App\Http\Controllers\Backend\HomeSliderController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\DesktopServicesController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JobApplicationController;
use App\Http\Controllers\Frontend\PrivacyPolicyController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\frontend\TarmAndConditionsController;
use App\Http\Controllers\UserController;


// Frontend View
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

    // Term Conditions Page
    Route::get("/terms", [TarmAndConditionsController::class,"terms"])->name("terms");


// featured Section

    Route::get("/desktop-services", [DesktopServicesController::class,"DesktopServices"])->name("desktop.services");




    // Login User

    Route::get('login', [CustomAuthController::class, 'login'])->name('login');
    Route::get('register', [CustomAuthController::class, 'register'])->name('register');
    Route::post('register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
    Route::post('login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');

    //Forgot Password
    Route::get('/forgot-password', [CustomAuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
    Route::post('/forgot-password', [CustomAuthController::class, 'handleForgotPassword'])->name('handle-forgot-password');

    //Reset Password
    Route::get('/reset-password', [CustomAuthController::class, 'showResetPasswordForm'])->name('reset-password');
    Route::post('/reset-password', [CustomAuthController::class, 'resetPassword'])->name('handle-reset-password');


    //Job Applications


        Route::get('/job-applications/create', [JobApplicationController::class, 'create'])->name('job_applications.create');
        Route::post('/job-applications', [JobApplicationController::class, 'store'])->name('job_applications.store');


Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logOut')->middleware('auth');

require base_path('routes/admin.php');







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
