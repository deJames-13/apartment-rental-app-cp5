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
  return view('mail.email-verify', ['user' => auth()->user(), 'verificationUrl' => url('/') . '/verify/' .  auth()->user()->remember_token]);
});

// GUEST
require __DIR__ . '/guest.php';

// AUTH
require __DIR__ . '/auth.php';
