<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;

class Register extends Component
{

    public $first_name  = '';
    public $last_name  = '';
    public $username  = '';
    public $email  = '';
    public $password  = '';
    public $password_confirmation  = '';

    protected $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'username' => 'required|string|unique:users,username',
        'email' => 'required|string:email:unique:users,email',
        'password' => 'required|min:6|max:12|confirmed',
        // STRICT PASS
        // 'password' => 'required|min:6|max:12|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
    ];
    protected $messages = [
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 6 characters.',
        'password.max' => 'The password may not be greater than 12 characters.',
        'password.regex' => 'The password format is not valid. It must contain at least one symbol, a capital letter, and a number.',
    ];
    public function render()
    {
        return view('auth.register');
    }

    public function save()
    {
        $this->validate();
        $request = request();
        $request->replace([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ]);


        Session::put('user_data', $request->all());
        $this->dispatch('save-success');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
