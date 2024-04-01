<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
  public $active = 'units';
  public $search = '';
  public $location = '';
  public $unit_types = ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'];
  public $property_types = ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'];
  public $selected_ptype = '';
  public $selected_utype = '';

  public function render()
  {
    return view('frontend.partials.search-bar');
  }


  public function search()
  {
    if ($this->active === 'units') {
      return redirect()->route('search.units', [
        'search' => $this->search,
        'unit_type' => $this->selected_utype,
        'location' => $this->unitLocation,

      ]);
    }
    if ($this->active === 'properties') {
      return redirect()->route('search.properties', [
        'search' => $this->search,
        'property_type' => $this->selected_ptype,
        'location' => $this->propLocation
      ]);
    }
  }
  public function setToUnit()
  {
    $this->active = 'units';
  }
  public function setToProperties()
  {
    $this->active = 'properties';
  }
}
