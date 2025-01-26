<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HomeSliderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Frontend\JobApplicationController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=> 'auth', 'prefix' => 'admin'], function(){

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('adminDashboard');

    // User End
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('sabbir.edit');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('sabbir.destroy');
    Route::get('/users/{id}/view', [CustomAuthController::class, 'view'])->name('sabbir.view');

    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

    Route::get('/user/list', [UserController::class, 'userList'])->name('listOfUser');

    // Slider
Route::prefix('home/slider')->group(function () {
    Route::get('/', [HomeSliderController::class, 'index'])->name('adminHomeSlider');
    Route::get('/create', [HomeSliderController::class, 'create'])->name('adminHomeSlider.create');
    Route::post('/store', [HomeSliderController::class, 'store'])->name('adminHomeSlider.store');
    Route::get('/edit/{id}', [HomeSliderController::class, 'edit'])->name('adminHomeSlider.edit');
    Route::put('/update/{id}', [HomeSliderController::class, 'update'])->name('adminHomeSlider.update');
    Route::delete('/delete/{id}', [HomeSliderController::class, 'destroy'])->name('adminHomeSlider.destroy');
    Route::post('/status-published', [HomeSliderController::class, 'updateStatus'])->name('sliders.status');

});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('adminProducts');
    Route::get('/create', [ProductController::class, 'create'])->name('adminProducts.create');
    Route::post('/store', [ProductController::class, 'store'])->name('adminProducts.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('adminProducts.edit');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('adminProducts.update');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('adminProducts.destroy');
    Route::post('/status-published', [ProductController::class, 'updateStatus'])->name('sliders.status');
});

Route::prefix('jobs')->group(function () {
    Route::get('/', [JobApplicationController::class, 'index'])->name('jobs.index');
    Route::get('/{id}', [JobApplicationController::class, 'show'])->name('job_applications.show');
    Route::get('/{id}/edit', [JobApplicationController::class, 'edit'])->name('job_applications.edit');
    Route::put('/{id}/update', [JobApplicationController::class, 'update'])->name('job_applications.update');
    Route::delete('/{id}', [JobApplicationController::class, 'destroy'])->name('job_applications.destroy');
    Route::get('/job_applications/{id}/download', [JobApplicationController::class, 'download'])->name('job_applications.download');

});

});
