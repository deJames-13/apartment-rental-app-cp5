<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyListingController;
use App\Http\Controllers\UnitController;

// AUTH
Route::get('/verify/{token}', [AuthController::class, 'verifyEmail'])->name('verify-email')->middleware('auth');

Route::middleware(['verified'])->group(function () {

    Route::get('/', [AppController::class, 'default'])->name('home');
    Route::get('/home', [AppController::class, 'default'])->name('home');
    Route::get('/logout', [AuthController::class, 'login']);
    Route::post('/logout ', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');


    // LANDLORD
    Route::middleware('role:landlord')->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/dashboard/properties', [DashboardController::class, 'properties'])->name('dashboard.properties');
        Route::get('/dashboard/units', [DashboardController::class, 'units'])->name('units.index');
        Route::get('/dashboard/transactions', [DashboardController::class, 'transactions'])->name('dashboard.transactions');
        Route::get('/dashboard/applications', [DashboardController::class, 'applications'])->name('dashboard.applications');
        Route::get('/dashboard/reports', [DashboardController::class, 'reports'])->name('dashboard.reports');
        Route::get('/dashboard/bookmarks', [DashboardController::class, 'bookmarks'])->name('dashboard.bookmarks');


        // Properties
        Route::get('/properties/posts/create', [PropertyListingController::class, 'create'])->name('properties.create');
        Route::post('/properties/posts/create', [PropertyListingController::class, 'store'])->name('properties.store');
        Route::get('/properties/posts/edit/{id}', [PropertyListingController::class, 'edit'])->name('properties.edit');
        Route::post('/properties/posts/edit/{id}', [PropertyListingController::class, 'update'])->name('properties.update');

        // Units
        Route::get('/units/create', [UnitController::class, 'create'])->name('units.create');
        Route::post('/units/create', [UnitController::class, 'store'])->name('units.store');
        Route::get('/units/edit/{id}', [UnitController::class, 'edit'])->name('units.edit');
        Route::post('/units/edit/{id}', [UnitController::class, 'update'])->name('units.update');
    });

    Route::middleware('role:tenant')->group(function () {
    });

    Route::middleware('role:admin')->group(function () {
    });
});
