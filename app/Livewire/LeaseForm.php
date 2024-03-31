<?php

namespace App\Livewire;

use App\Models\Unit;
use Livewire\Component;
use App\Models\LeaseInfo;

class LeaseForm extends Component
{
    public $property, $property_name, $property_id, $units, $unit, $unit_id, $unit_code, $lease_type, $lease_application_fee, $lease_fee, $security_deposit, $short_term_rent, $long_term_rent, $termination_amount;
    public $is_termination_allowed = false;
    public $is_sub_leasing_allowed = false;
    public $status = 'active';

    protected $rules = [
        'property_id' => 'required',
        'unit_code' => 'required',
        'lease_type' => 'required',
        'lease_application_fee' => 'required|numeric',
        'lease_fee' => 'required|numeric',
        'security_deposit' => 'required|numeric',
        'short_term_rent' => 'required|numeric',
        'long_term_rent' => 'required|numeric',
        'status' => 'required|in:active,inactive',
    ];
    protected $messages = [
        'property_id' => 'The property is required.'
    ];



    public function mount()
    {
        $this->units = Unit::all()->pluck('unit_code', 'id')->toArray();
    }

    public function render()
    {
        return view('frontend.lease-infos.lease-form');
    }
    public function save()
    {
        if ($this->is_termination_allowed) {
            $this->validateOnly('termination_amount', ['termination_amount' => 'required|numeric']);
        }

        $validatedData = $this->validate();
        $validatedData['unit_id'] = $this->unit_id;
        dd($validatedData);
        LeaseInfo::create($validatedData);
        session()->flash('success', 'Lease information created successfully.');
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
}
