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
    }

    public function render()
    {
        return view('auth.set-role');
    }
}
