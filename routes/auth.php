<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyListingController;
// AUTH
Route::middleware(['auth'])->group(function () {


    Route::get('/home', [AppController::class, 'default'])->name('home');
    Route::get('/logout', [AuthController::class, 'login']);
    Route::post('/logout ', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');


    // LANDLORD
    Route::middleware('role:landlord')->group(function () {

        // Dashboard
        Route::get('/dashboard', [AppController::class, 'landlordDashboard'])->name('dashboard');

        // Properties
        Route::get('/properties/posts/create', [PropertyListingController::class, 'create'])->name('properties.create');
        Route::post('/properties/posts/create', [PropertyListingController::class, 'store'])->name('properties.store');
        Route::get('/properties/posts/edit/{id}', [PropertyListingController::class, 'edit'])->name('properties.edit');
        Route::post('/properties/posts/edit/{id}', [PropertyListingController::class, 'update'])->name('properties.update');
    });

    Route::middleware('role:tenant')->group(function () {
    });

    Route::middleware('role:admin')->group(function () {
    });
});
