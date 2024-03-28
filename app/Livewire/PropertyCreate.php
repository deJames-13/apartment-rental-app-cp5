<?php

namespace App\Livewire;

use App\Http\Controllers\PropertyListingController;
use Livewire\Component;

class PropertyCreate extends Component
{
    public $default_amount = 0;
    public $max_amount = 0;
    public $lowest_amount = 0;
    public function save()
    {
        $request = request();
        app('session')->start();
        $response = app(PropertyListingController::class)->store($request);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('frontend.property-listings.create');
    }
}
