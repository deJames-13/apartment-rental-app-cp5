<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
  public $active = 'property';
  public $unit_types = ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'];
  public $property_types = ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'];
  public $selected_ptype = '';
  public $selected_utype = '';
  public $unitLocation = '';
  public $propLocation = '';

  public function render()
  {
    return view('frontend.partials.search-bar');
  }

  public function searchProperty()
  {
  }
  public function unitProperty()
  {
  }
}
