<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Test View
Route::get('/test', function () {
  return view('auth.index', ['active' => 'set-role']);
});

// GUEST
Route::middleware('guest')->group(function () {
  Route::get('/', [AppController::class, 'guest'])->name('guest');
  Route::get('/home', [AppController::class, 'guest'])->name('guest');
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::get('/register', [AuthController::class, 'register'])->name('register');
  Route::get('/authenticate ', [AuthController::class, 'authenticate']);
  Route::post('/store', [AuthController::class, 'store']);
});

// AUTH
Route::middleware(['auth'])->group(function () {
  Route::get('/home', [AppController::class, 'default'])->name('home');
  Route::get('/logout', [AuthController::class, 'login']);
  Route::post('/logout ', [AuthController::class, 'logout'])->name('logout');


  Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
  Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');


  Route::middleware('role:landlord')->group(function () {

    // PROPERTIES LANDLORD
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



// GLOBAL


// PROPERTIES GLOBAL
Route::get('/properties', [PropertyListingController::class, 'index'])->name('properties.index');
Route::get('/properties/posts', [PropertyListingController::class, 'index'])->name('properties.posts');
Route::get('/properties/{id}', [PropertyListingController::class, 'show'])->name('properties.show');
Route::get('/properties/category', [PropertyListingController::class, 'category'])->name('properties.category');
Route::get('/properties/popular', [PropertyListingController::class, 'popular'])->name('properties.popular');
