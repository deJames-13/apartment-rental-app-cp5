<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
  public $unit_types = [];
  public $property_types = ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'];
  public $selected_ptype = '';
  public $selected_utype = '';


  public function render()
  {
    return view('frontend.partials.search-bar');
  }
}
