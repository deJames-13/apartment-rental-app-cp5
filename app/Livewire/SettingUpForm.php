<?php

namespace App\Livewire;

use App\Models\Unit;
use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PropertyListing;
use App\Mail\PendingApplication;
use App\Models\LeaseApplication;
use Illuminate\Support\Facades\Mail;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule;

class SettingUpForm extends Component
{
  use WithFileUploads;
  use Toast;

  public $application, $property, $property_id, $property_name, $units, $unit, $unit_id, $unit_code;
  public $tenant_id, $landlord_id, $start_date, $end_date, $status = "pending", $title, $notes, $tenant_id_card, $tenant_signature;
  public float $rent_amount;


  public function mount(LeaseApplication $application = null, PropertyListing $property = null)
  {
    $this->application = $application->exists ? $application : null;
    $this->units = Unit::all()->pluck('unit_code', 'id')->toArray();
    if ($application->exists) {
      $this->tenant_id = $application->tenant_id;
      $this->landlord_id = $application->landlord_id;
      $this->status = $application->status;
      $this->title = $application->title;
      $this->notes = $application->notes;
      $this->tenant_id_card = $application->tenant_id_card;
      $this->tenant_signature = $application->tenant_signature;
      $this->property_id =  $application->property_id;
      $this->unit = $application->unit;
      $this->unit_code = $application->unit->unit_code;
      $this->property = $application->propertyListing;
      $this->property_name = $application->propertyListing->property_name;
      $this->unit_id =  $application->unit_id;
    }
    if ($property->exists) {
      $this->property_id = $property->id;
      $this->property = $property;
      $this->property_name = $property->name;
      $this->units = Unit::where('property_id', $property->id)->pluck('unit_code', 'id')->toArray();
      $this->rent_amount = $property->lowest_price ? $property->lowest_price : $property->default_price;
    }
  }

  public function submit()
  {
    try {


      if ($this->tenant_id_card) {
        $this->tenant_id_card = $this->tenant_id_card->store('tenant_id_cards', 'public');
      }
      if ($this->tenant_signature) {
        $this->tenant_signature = $this->tenant_signature->store('tenant_signatures', 'public');
      }


      $this->landlord_id = $this->property->landlord_id;
      $this->tenant_id = auth()->id();
      $this->status = 'pending';



      LeaseApplication::create([
        'tenant_id' => $this->tenant_id,
        'landlord_id' => $this->landlord_id,
        'property_id' => $this->property_id,
        'unit_id' => $this->unit_id,
        'rent_amount' => $this->rent_amount,
        'status' => $this->status,
        'title' => $this->title,
        'notes' => $this->notes,
        'tenant_id_card' => $this->tenant_id_card,
        'tenant_signature' => $this->tenant_signature,
      ]);


      session()->flash('message', 'Application submitted successfully!');
      $this->reset();
      $user = auth()->user();
      Mail::to($user->email)->send(new PendingApplication($user));
      $this->toast(
        type: 'success',
        title: 'Created successfully',
        description: null,
        position: 'toast-top toast-end',
        icon: 'o-information-circle',
        css: 'alert-success',
        timeout: 3000,
      );
    } catch (\Throwable $th) {
      dd($th);
    }

    return redirect()->route('applications.index');
  }


  public function setProperty($propertyId)
  {
    $this->property_id = $propertyId;
    $this->property = PropertyListing::find($propertyId);
    $this->units = Unit::where('property_id', $propertyId)->pluck('unit_code', 'id')->toArray();
    $this->rent_amount = $this->property->lowest_price ? $this->property->lowest_price : $this->property->default_price;
    $this->unit_code = null;
  }

  public function setUnit($unitId)
  {
    $this->unit_id = $unitId;
    $u = Unit::find($unitId);
    $this->unit = $u;
    $this->unit_code = $u->unit_code;
    $this->property = $u->propertyListing;
    $this->property_name = $this->property_name;
  }
  public function render()
  {
    return view('frontend.applications.setting-up-form');
  }
}
