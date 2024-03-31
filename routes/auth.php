<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyListingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UnitController;

// AUTH
Route::get('/verify/{token}', [AuthController::class, 'verifyEmail'])->name('verify-email')->middleware('auth');

Route::middleware(['verified'])->group(function () {

    Route::get('/', [AppController::class, 'default'])->name('index');
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
        Route::get('/dashboard/units', [DashboardController::class, 'units'])->name('dashboard.units');
        Route::get('/dashboard/transactions', [DashboardController::class, 'transactions'])->name('dashboard.transactions');
        Route::get('/dashboard/applications', [DashboardController::class, 'applications'])->name('dashboard.applications');
        Route::get('/dashboard/reports', [DashboardController::class, 'reports'])->name('dashboard.reports');
        Route::get('/dashboard/bookmarks', [DashboardController::class, 'bookmarks'])->name('dashboard.bookmarks');


        // Properties
        Route::get('/properties/create', [PropertyListingController::class, 'create'])->name('properties.create');
        Route::post('/properties/create', [PropertyListingController::class, 'store'])->name('properties.store');
        Route::get('/properties/edit/{id}', [PropertyListingController::class, 'edit'])->name('properties.edit');
        Route::post('/properties/edit/{id}', [PropertyListingController::class, 'update'])->name('properties.update');

        // Units
        Route::get('/units/create', [UnitController::class, 'create'])->name('units.create');
        Route::post('/units/create', [UnitController::class, 'store'])->name('units.store');
        Route::get('/units/edit/{id}', [UnitController::class, 'edit'])->name('units.edit');
        Route::post('/units/edit/{id}', [UnitController::class, 'update'])->name('units.update');


        // Lease Info
        Route::get('/leases/create', [LeaseController::class, 'create'])->name('leases.create');
        Route::post('/leases/create', [LeaseController::class, 'store'])->name('leases.store');
        Route::get('/leases/edit/{id}', [LeaseController::class, 'edit'])->name('leases.edit');
        Route::post('/leases/edit/{id}', [LeaseController::class, 'update'])->name('leases.update');

        // Applications
        Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
        Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
        Route::post('/applications/create', [ApplicationController::class, 'store'])->name('applications.store');
        Route::get('/applications/edit/{id}', [ApplicationController::class, 'edit'])->name('applications.edit');
        Route::post('/applications/edit/{id}', [ApplicationController::class, 'update'])->name('applications.update');

        // Transactions
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
        Route::post('/transactions/create', [TransactionController::class, 'store'])->name('transactions.store');
        Route::get('/transactions/edit/{id}', [TransactionController::class, 'edit'])->name('transactions.edit');
        Route::post('/transactions/edit/{id}', [TransactionController::class, 'update'])->name('transactions.update');

        // Reports

    });

    Route::middleware('role:tenant')->group(function () {
    });

    Route::middleware('role:admin')->group(function () {
    });
});
