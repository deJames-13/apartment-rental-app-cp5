<?php

namespace App\Livewire;

use App\Models\Unit;
use Livewire\Component;
use App\Models\LeaseApplication;

class SettingUpForm extends Component
{
  public $application, $property, $property_id, $property_name, $units, $unit, $unit_id, $unit_code;
  public $tenant_id, $landlord_id, $start_date, $end_date, $rent_amount, $status, $title, $notes, $tenant_id_card, $tenant_signature;
  public function mount(LeaseApplication $application = null)
  {
    $this->reset();
    $this->application = $application->exists ? $application : null;
    $this->units = Unit::all()->pluck('unit_code', 'id')->toArray();
    if ($application->exists) {
      # code...
    }
  }
  public function save()
  {
  }
  public function update()
  {
  }
  public function setProperty($propertyId)
  {
    $this->property_id = $propertyId;
    $this->units = Unit::where('property_id', $propertyId)->pluck('unit_code', 'id')->toArray();
    $this->unit_code = null;
  }
  public function setUnit($unitId)
  {
    $u = Unit::findOrFail($unitId);
    $this->unit = $u;
    $this->unit_id = $u->id;
    $this->unit_code = $u->unit_code;
    $this->property = $u->propertyListing;
    $this->property_name = $this->property_name;
  }
  public function render()
  {
    return view('frontend.applications.setting-up-form');
  }
}
