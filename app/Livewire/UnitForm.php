<?php

namespace App\Livewire;

use App\Models\Unit;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class UnitForm extends Component
{
    use WithFileUploads;
    public $property;
    public $propertyId, $unit_code, $floor_number, $no_of_bedroom, $no_of_bathroom, $unit_thumbnail, $date_posted, $date_available_from, $description, $heading, $status;
    protected $rules = [
        'unit_code' => 'required|string|max:255',
        'floor_number' => 'required|integer',
        'no_of_bedroom' => 'required|integer',
        'no_of_bathroom' => 'required|integer',
        'unit_thumbnail' => 'nullable|image|mimes:jpeg,png,webp',
        'date_posted' => 'nullable|date',
        'date_available_from' => 'nullable|date',
        'description' => 'nullable|string|max:255',
        'heading' => 'nullable|string|max:255',
        'status' => 'required|in:available,occupied,inactive',
    ];

    public function mount()
    {
        $this->unit_code = strtoupper(Str::random(10) . now()->second);
    }

    public function save()
    {
        $validatedData = $this->validate($this->rules);

        if ($this->unit_thumbnail) {
            $filename = time() . '_' . Str::slug($this->unit_thumbnail->getClientOriginalName());
            $this->unit_thumbnail->storeAs('public/unit-thumbnails', $filename);
            $validatedData['unit_thumbnail'] = 'unit-thumbnails/' . $filename;
        }

        $validatedData['property_id'] = $this->propertyId;

        Unit::create($validatedData);

        session()->flash('message', 'Unit created successfully');
        return redirect()->route('units.create');
    }

    public function render()
    {
        return view('frontend.units.unit-form');
    }
}
