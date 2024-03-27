<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\AuthController;

class Logout extends Component
{
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
        return <<<'HTML'
        <div>
            <x-form method='post' wire:submit='save'>
                @csrf
                <x-button class="bg-green-400 text-white" spinner='save' type='submit'>Log out</x-button>
            </x-form>
        </div>
        HTML;
    }
}
