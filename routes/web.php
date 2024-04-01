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

//test
Route::get('/ui/all-properties', function () {
  return view('frontend.ui.all-properties');
});
Route::get('/ui/popular-properties', function () {
  return view('frontend.ui.popular-properties');
});
Route::get('/ui/categories-properties', function () {
  return view('frontend.ui.categories-properties');
});
Route::get('/ui/view', function () {
  return view('frontend.ui.view');
});


Route::get('/test/sample', function () {
  return view('frontend.test.sample');
});

// GUEST
require __DIR__ . '/guest.php';

// AUTH
require __DIR__ . '/auth.php';
