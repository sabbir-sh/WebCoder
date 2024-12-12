<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HomeSliderController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=> 'auth', 'prefix' => 'admin'], function(){

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('adminDashboard');

    // User End
    Route::get('/users/{id}/edit', [CustomAuthController::class, 'edit'])->name('sabbir.edit');
    Route::put('/users/{id}', [CustomAuthController::class, 'update'])->name('sabbir.update');
    Route::delete('/users/{id}', [CustomAuthController::class, 'destroy'])->name('sabbir.destroy');
    Route::get('/users/{id}/view', [CustomAuthController::class, 'view'])->name('sabbir.view');

    Route::get('/user/create', [CustomAuthController::class, 'create'])->name('user.create');
    Route::post('/user/store', [CustomAuthController::class, 'store'])->name('user.store');

    Route::get('/user/list', [CustomAuthController::class, 'userList'])->name('listOfUser');


    // Slider
Route::prefix('home/slider')->group(function () {
    Route::get('/', [HomeSliderController::class, 'index'])->name('adminHomeSlider');
    Route::get('/create', [HomeSliderController::class, 'create'])->name('adminHomeSlider.create');
    Route::post('/store', [HomeSliderController::class, 'store'])->name('adminHomeSlider.store');
    Route::get('/edit/{id}', [HomeSliderController::class, 'edit'])->name('adminHomeSlider.edit');
    Route::put('/update/{id}', [HomeSliderController::class, 'update'])->name('adminHomeSlider.update');
    Route::delete('/delete/{id}', [HomeSliderController::class, 'destroy'])->name('adminHomeSlider.destroy');
});


});
