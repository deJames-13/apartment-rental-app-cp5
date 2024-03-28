<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// GUEST
Route::middleware('guest')->group(function () {
  Route::get('/', [AppController::class, 'guest'])->name('guest');
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::get('/register', [AuthController::class, 'register'])->name('register');
  Route::get('/authenticate ', [AuthController::class, 'authenticate']);
  Route::post('/store', [AuthController::class, 'store']);
});

// AUTH
Route::middleware('auth')->group(function () {

  Route::get('/home', [AppController::class, 'default'])->name('home');

  Route::get('/logout', [AuthController::class, 'login']);
  Route::post('/logout ', [AuthController::class, 'logout'])->name('logout');
});
