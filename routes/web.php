<?php

use App\Livewire\Register;
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

Route::get('/', function () {
  return view('index');
});



Route::middleware('guest')->group(function () {

  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::get('/register', [AuthController::class, 'register'])->name('register');
  Route::get('/authenticate ', [AuthController::class, 'authenticate']);
  Route::post('/store', [AuthController::class, 'store']);
});
Route::middleware('auth')->group(function () {

  Route::post('/logout ', [AuthController::class, 'logout'])->name('logout');
});
