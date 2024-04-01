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


  public function searchQuery()
  {
    // if search are empty
    if ($this->search === '' && $this->location === '') {
      return redirect('/');
    }
    if ($this->active === 'units') {
      return redirect()->route('units.all', [
        'search' => $this->search,
        'unit_type' => $this->selected_utype,
        'location' => $this->location,

      ]);
    }
    if ($this->active === 'properties') {
      return redirect()->route('properties.all', [
        'search' => $this->search,
        'property_type' => $this->selected_ptype,
        'location' => $this->location
      ]);
    }
  }
  public function setToUnit()
  {
    $this->search = '';
    $this->location = '';
    $this->active = 'units';
  }
  public function setToProperties()
  {
    $this->search = '';
    $this->location = '';
    $this->active = 'properties';
  }
}
