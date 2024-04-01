<?php

namespace App\Livewire;

use App\Models\PropertyListing;
use App\Models\Unit;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class UnitForm extends Component
{
  use WithFileUploads;
  public $unit;
  public $property_id, $unit_code, $room_number, $floor_number, $no_of_bedroom, $no_of_bathroom, $unit_thumbnail, $date_posted, $date_available_from, $description, $heading, $status;

  protected $rules = [
    'property_id' => 'required',
    'unit_code' => 'required|string|max:255',
    'room_number' => 'required|integer',
    'floor_number' => 'required|integer',
    'no_of_bedroom' => 'required|integer',
    'no_of_bathroom' => 'required|integer',
    'unit_thumbnail' => 'nullable',
    'date_posted' => 'nullable|date',
    'date_available_from' => 'nullable|date',
    'description' => 'nullable|string|max:255',
    'heading' => 'nullable|string|max:255',
    'status' => 'required|in:available,occupied,inactive',
  ];
  protected $messages = [
    'property_id' => 'The property is required.'
  ];


  public function mount(Unit $unit = null)
  {
    $this->reset();
    $this->unit = $unit->exists ? $unit : null;
    $this->unit_code = strtoupper(Str::random(10) . date('dHis'));
    if ($unit->exists) {
      $this->property_id = $unit->property_id;
      $this->unit_code = $unit->unit_code;
      $this->room_number = $unit->room_number;
      $this->floor_number = $unit->floor_number;
      $this->no_of_bedroom = $unit->no_of_bedroom;
      $this->no_of_bathroom = $unit->no_of_bathroom;
      $this->date_posted = $unit->date_posted;
      $this->date_available_from = $unit->date_available_from;
      $this->description = $unit->description;
      $this->unit_thumbnail = $unit->unit_thumbnail;
      $this->heading = $unit->heading;
      $this->status = $unit->status;
    }
  }

  public function save()
  {
    $validatedData = $this->validate($this->rules);
    $validatedData['property_id'] = $this->property_id;
    $validatedData['unit_code'] = $this->unit_code;
    if ($this->unit_thumbnail) {
      $filename = $this->unit_code . '_' . $this->unit_thumbnail->getClientOriginalName();

      $this->unit_thumbnail->storeAs('public/units', $filename);
      $validatedData['unit_thumbnail'] = 'units/' . $filename;
    }
    Unit::create($validatedData);
    $property = PropertyListing::find($this->property_id);
    $property->update([
      'no_of_units' => $property->units->count()
    ]);

    session()->flash('message', 'Unit created successfully');
    return redirect()->route('units.create');
  }

  public function setProperty($propertyId)
  {
    $this->property_id = $propertyId;
  }
  public function update()
  {
    $validatedData = $this->validate($this->rules);

    if (is_object($this->unit_thumbnail)) {
      try {
        $filename = $this->unit_code . '_' . time() . '_' . $this->unit_thumbnail->getClientOriginalName();
        $this->unit_thumbnail->storeAs('public/units', $filename);
        $validatedData['unit_thumbnail'] = 'units/' . $filename;
      } catch (\Exception $e) {
      }
    }

    $this->unit->update($validatedData);

    session()->flash('message', 'Unit updated successfully');
    return redirect()->route('units.edit', $this->unit);
  }

  public function render()
  {
    return view('frontend.units.unit-form');
  }
}
