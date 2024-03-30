<?php

namespace App\Livewire;

use Livewire\Component;

class SetRole extends Component
{
    public $role = '';
    public function setRole()
    {
        dd($this->role);
    }

    public function updatedRole($value)
    {
        $this->validate([
            'role' => 'required|in:landlord,tenant',
        ]);
        $user_data = session('user_data');
        $user_data['role'] = $this->role;

        session()->put('user_data', $user_data);


        // dd(session('user_data'));
    }

    public function render()
    {
        return view('auth.set-role');
    }
}
