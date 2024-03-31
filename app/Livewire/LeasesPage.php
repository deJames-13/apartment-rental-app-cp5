<?php

namespace App\Livewire;

use Livewire\Component;

class LeasesPage extends Component
{
    public bool $myModal2 = false;
    public function render()
    {
        return view('dashboard.leases.main');
    }
}
