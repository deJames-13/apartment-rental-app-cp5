<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function register()
  {
    return view('auth.index', ['active' => 'register']);
  }

  public function store(Request $request)
  {
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
    return view('auth.index', ['active' => 'login']);
  }

  public function authenticate(Request $request)
  {
    $data = $request->validate([
      'email' => ['required'],
      'password' => 'required'
    ]);

    if (auth()->attempt($data)) {
      $request->session()->regenerate();
      return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'error' => 'Invalid credentials. ']);
  }

  public function logout(Request $request, string $id)
  {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'Logout successfully');
  }
}
