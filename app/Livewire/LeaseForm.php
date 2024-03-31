<?php

namespace App\Livewire;

use App\Models\Unit;
use Livewire\Component;
use App\Models\LeaseInfo;

class LeaseForm extends Component
{
    public $lease;
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



    public function mount(LeaseInfo $lease)
    {
        $this->reset();
        $this->lease = $lease->exists ? $lease : null;
        $this->units = Unit::all()->pluck('unit_code', 'id')->toArray();

        if ($lease->exists) {
            $this->lease = $lease;
            $this->property = $lease->unit->propertyListing;
            $this->property_name = $this->property->property_name;
            $this->property_id =  $this->property->id;
            $this->units = $this->property->units->pluck('unit_code', 'id')->toArray();
            $this->unit = $lease->unit;
            $this->unit_id = $lease->unit_id;
            $this->unit_code = $this->unit->unit_code;
            $this->lease_type = $lease->lease_type;
            $this->lease_application_fee = $lease->lease_application_fee;
            $this->lease_fee = $lease->lease_fee;
            $this->security_deposit = $lease->security_deposit;
            $this->short_term_rent = $lease->short_term_rent;
            $this->long_term_rent = $lease->long_term_rent;
            $this->termination_amount = $lease->termination_amount;
            $this->is_termination_allowed = $lease->is_termination_allowed;
            $this->is_sub_leasing_allowed = $lease->is_sub_leasing_allowed;
            $this->status = $lease->status;
        }
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
        unset($validatedData['property_id']);
        unset($validatedData['unit_code']);
        LeaseInfo::create($validatedData);
        session()->flash('message', 'Lease information created successfully.');
        return redirect()->route('leases.create');
    }
    public function update()
    {
        if ($this->is_termination_allowed) {
            $this->validateOnly('termination_amount', ['termination_amount' => 'required|numeric']);
        }

        $validatedData = $this->validate();
        unset($validatedData['property_id']);
        unset($validatedData['unit_code']);

        $this->lease->update($validatedData);
        session()->flash('message', 'Lease information updated successfully.');
        return redirect()->route('leases.edit', $this->lease);
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
