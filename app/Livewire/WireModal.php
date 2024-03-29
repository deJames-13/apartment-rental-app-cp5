<?php

namespace App\Livewire;

use Livewire\Component;

class WireModal extends Component
{
    public $id;
    public function render()
    {
        return view('livewire.wire-modal');
    }
}
