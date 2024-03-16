<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\AuthController;

class Login extends Component
{

    public $username  = '';
    public $email  = '';
    public $password  = '';
    protected $rules = [
        'username' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];
    protected $messages = [
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 6 characters.',
        'password.max' => 'The password may not be greater than 12 characters.',
        'password.regex' => 'The password format is not valid. It must contain at least one symbol, a capital letter, and a number.',
    ];
    public function save()
    {
        $this->validate();
        $request = request();
        $request->replace([
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        app('session')->start();
        app(AuthController::class)->authenticate($request);
        $this->username = '';
        $this->email = '';
        $this->password = '';
        return redirect()->to('/');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('auth.login');
    }
}
