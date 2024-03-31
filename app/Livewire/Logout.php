<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\AuthController;

class Logout extends Component
{
    public $minimized = false;
    public function save()
    {
        $request = request();
        $id = auth()->user()->id;
        $authController = app()->make(AuthController::class);
        $authController->logout($request, $id);

        return redirect()->to('/login');
    }
    public function render()
    {
        return view('auth.logout');
    }
}
