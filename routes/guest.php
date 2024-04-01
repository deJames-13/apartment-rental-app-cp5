<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PropertyListingController;


// GLOBAL
// PROPERTIES GLOBAL
Route::get('/properties', [PropertyListingController::class, 'index'])->name('properties.all');
Route::get('/properties/posts', [PropertyListingController::class, 'index'])->name('properties.posts');
Route::get('/properties/view/{id}', [PropertyListingController::class, 'show'])->name('properties.show');
Route::get('/properties/category', [PropertyListingController::class, 'category'])->name('properties.category');
Route::get('/properties/popular', [PropertyListingController::class, 'popular'])->name('properties.popular');

Route::get('/units', [UnitController::class, 'index'])->name('units.all');
Route::get('/units/posts', [UnitController::class, 'index'])->name('units.posts');
Route::get('/units/view/{id}', [UnitController::class, 'show'])->name('units.show');
Route::get('/units/category', [UnitController::class, 'category'])->name('units.category');
Route::get('/units/popular', [UnitController::class, 'popular'])->name('units.popular');


// GUEST
Route::middleware('guest')->group(function () {
  Route::get('/', [AppController::class, 'guest'])->name('guest');
  Route::get('/home', [AppController::class, 'guest'])->name('guest');
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::get('/register', [AuthController::class, 'register'])->name('register');
  Route::get('/authenticate ', [AuthController::class, 'authenticate']);
  Route::post('/store', [AuthController::class, 'store']);

});

Route::get('/', [AppController::class, 'guest'])->name('guest');
