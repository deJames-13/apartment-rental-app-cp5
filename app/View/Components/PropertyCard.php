<?php

namespace App\View\Components;

use App\Models\PropertyListing;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PropertyCard extends Component
{
    public $property;
    public function __construct(PropertyListing $property)
    {
        $this->property = $property;
    }


    public function render(): View|Closure|string
    {
        return view('components.property-card');
    }
}
