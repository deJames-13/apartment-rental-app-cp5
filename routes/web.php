<?php

use Illuminate\Support\Facades\Route;

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
require __DIR__ . '/guest.php';

// AUTH
require __DIR__ . '/auth.php';
