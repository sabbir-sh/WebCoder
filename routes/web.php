<?php

use App\Http\Controllers\Backend\HomeSliderController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\HomeController;
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




Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logOut')->middleware('auth');

Route::group(['middleware'=> 'auth'], function(){

    // Dashboard
    Route::get('admin/dashboard', [CustomAuthController::class, 'dashboard'])->name('adminDashboard');

    // User End
    Route::get('/users/{id}/edit', [CustomAuthController::class, 'edit'])->name('sabbir.edit');
    Route::put('/users/{id}', [CustomAuthController::class, 'update'])->name('sabbir.update');
    Route::delete('/users/{id}', [CustomAuthController::class, 'destroy'])->name('sabbir.destroy');
    Route::get('/users/{id}/view', [CustomAuthController::class, 'view'])->name('sabbir.view');

    Route::get('/user/create', [CustomAuthController::class, 'create'])->name('user.create');
    Route::post('/user/store', [CustomAuthController::class, 'store'])->name('user.store');

    Route::get('/user/list', [CustomAuthController::class, 'userList'])->name('listOfUser');


});


// Slider
Route::prefix('admin/home/slider')->group(function () {
    Route::get('/', [HomeSliderController::class, 'index'])->name('adminHomeSlider');
    Route::get('/create', [HomeSliderController::class, 'create'])->name('adminHomeSlider.create');
    Route::post('/store', [HomeSliderController::class, 'store'])->name('adminHomeSlider.store');
    Route::get('/edit/{id}', [HomeSliderController::class, 'edit'])->name('adminHomeSlider.edit');
    Route::put('/update/{id}', [HomeSliderController::class, 'update'])->name('adminHomeSlider.update');
    Route::delete('/delete/{id}', [HomeSliderController::class, 'destroy'])->name('adminHomeSlider.destroy');
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
