<?php

namespace App\Livewire;

use App\Models\Unit;
use Livewire\Component;
use App\Models\LeaseApplication;
use App\Models\PropertyListing;

class ApplicationForm extends Component
{
  public $application, $property, $property_id, $property_name, $units, $unit, $unit_id, $unit_code;
  public $tenant_id, $landlord_id, $start_date, $end_date, $rent_amount, $status, $title, $notes, $tenant_id_card, $tenant_signature;
  public function mount(LeaseApplication $application = null, PropertyListing $property = null)
  {
    $this->reset();
    $this->application = $application->exists ? $application : null;
    $this->units = Unit::all()->pluck('unit_code', 'id')->toArray();
    if ($application->exists) {
      $this->property = $application->unit->propertyListing;
      $this->property_id = $this->property->id;
      $this->property_name = $this->property->name;
      $this->unit = $application->unit;
      $this->unit_id = $application->unit_id;
      $this->unit_code = $application->unit->unit_code;
      $this->tenant_id = $application->tenant_id;
      $this->landlord_id = $application->landlord_id;
      $this->start_date = $application->start_date;
      $this->end_date = $application->end_date;
      $this->rent_amount = $application->rent_amount;
      $this->status = $application->status;
      $this->title = $application->title;
      $this->notes = $application->notes;
      $this->tenant_id_card = $application->tenant_id_card;
      $this->tenant_signature = $application->tenant_signature;
    }
    if ($property->exists) {
      $this->property = $property;
      $this->property_id = $property->id;
      $this->property_name = $property->name;
    }
  }

  public function save()
  {
  }
  public function update()
  {
  }
  public function render()
  {
    return view('frontend.applications.application-form');
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
}
