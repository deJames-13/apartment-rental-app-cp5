<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\StoreRequest;

class AuthController extends Controller
{
  public function register()
  {
    return view('auth.register');
  }

  public function store(Request $request)
  {
    // FIXME: ADD USER
    $data = $request->validate([
      'first_name' => 'required|string',
      'last_name' => 'required|string',
      'username' => 'required|string|min:6|max:12|unique:users,username',
      'email' => 'required|string|unique:users,email',
      'password' => 'required|confirmed|min:6|max:12',
    ]);
    $data['password'] = bcrypt($data['password']);

    $user = User::create($data);
    auth()->login($user);
    return redirect('/')->with('message', 'User created and login');
  }

  public function login()
  {
    return view('auth.login');
  }
  public function authenticate(Request $request)
  {
    // FIXME: ADD AUTHENTICATE
    $data = $request->validate([
      'email' => ['required'],
      'password' => 'required'

    ]);
    if (auth()->attempt($data)) {
      $request->session()->regenerate();
      return redirect('/')->with('message', 'Login successfully!');
    }
    return back()->withErrors(['email' => 'Invalid credentials. '])->onlyInput('email');
  }

  public function logout(Request $request, string $id)
  {
    // FIXME: ADD LOGOUT
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'Logout successfully');
  }
}
