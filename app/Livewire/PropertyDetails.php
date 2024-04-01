<?php

namespace App\Livewire;

use Livewire\Component;

class PropertyDetails extends Component
{
  public $property;
  public $location = '', $units = null, $totalBaths = '', $totalBedrooms = '', $unitCount = '';

  public function mount($property)
  {
    $this->property = $property;
    $this->location = $property->address . ', ' . $property->city . ', ' . $property->region . ', ' . $property->country . ', ' . $property->zip_code;
    $this->units = $property->units;
    $this->totalBaths = $this->units->sum('no_of_bathrooms');
    $this->totalBedrooms = $this->units->sum('no_of_bedrooms');
    $this->unitCount = $this->units->count();
  }

  public function render()
  {
    return view('livewire.property-details');
  }
}
