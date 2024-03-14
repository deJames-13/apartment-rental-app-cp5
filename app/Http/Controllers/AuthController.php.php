<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function register()
  {
    return view('auth.register');
  }
  public function store(Request $request)
  {
    // TODO: ADD USER
  }
  public function storelogin()
  {
    return view('auth.login');
  }
  public function authenticate(Request $request)
  {
    // TODO: ADD AUTHENTICATE
  }
  public function logout(Request $request, string $id)
  {
    // TODO: ADD LOGOUT
  }
}
