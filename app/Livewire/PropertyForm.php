<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\PropertyListing;

class PropertyForm extends Component
{
    use WithFileUploads;
    public $property;

    public $property_name, $no_of_floors, $no_of_units, $address, $city, $region, $country, $postal_code, $default_price, $property_thumbnail, $heading, $description, $lowest_price, $max_price, $status, $type, $landlord_id;

    protected $rules = [
        'status' => 'required',
        'type' => 'required',
        'property_name' => 'required|string|max:255',
        'no_of_floors' => 'required|integer',
        'no_of_units' => 'required|integer',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'region' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'postal_code' => 'required|string|max:255',
        'default_price' => 'required|numeric',
        'property_thumbnail' => 'nullable|image|mimes:jpeg,png,webp',
        'heading' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
        'lowest_price' => 'nullable|numeric',
        'max_price' => 'nullable|numeric',
    ];

    public function mount(PropertyListing $property = null)
    {
        $this->property = null;
        $this->reset();
        $this->property = $property ?? null;
        if ($this->property->exists) {
            $this->property_name = $this->property->property_name;
            $this->no_of_floors = $this->property->no_of_floors;
            $this->no_of_units = $this->property->no_of_units;
            $this->address = $this->property->address;
            $this->city = $this->property->city;
            $this->region = $this->property->region;
            $this->country = $this->property->country;
            $this->postal_code = $this->property->postal_code;
            $this->default_price = $this->property->default_price;
            $this->property_thumbnail = $this->property->property_thumbnail;
            $this->heading = $this->property->heading;
            $this->description = $this->property->description;
            $this->lowest_price = $this->property->lowest_price;
            $this->max_price = $this->property->max_price;
            $this->status = $this->property->status;
            $this->type = $this->property->type;
            $this->landlord_id = $this->property->landlord_id;
        }
    }

    public function save()
    {
        $landlord_id = auth()->id();
        $validatedData = $this->validate($this->rules);

        $validatedData['landlord_id'] = $landlord_id;
        if ($this->property_thumbnail) {
            $filename = time() . '_' . Str::slug($this->property_thumbnail->getClientOriginalName());
            $this->property_thumbnail->storeAs('public/properties', $filename);
            $validatedData['property_thumbnail'] = 'properties/' . $filename;
        }



        PropertyListing::create($validatedData);
        session()->flash('message', 'Property Listing created successfully');
        return redirect()->route('properties.create');
    }

    public function update()
    {
        $landlord_id = auth()->id();
        $validatedData = $this->validate([
            'type' => 'sometimes',
            'property_name' => 'sometimes|string|max:255',
            'no_of_floors' => 'sometimes|integer',
            'no_of_units' => 'sometimes|integer',
            'address' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'region' => 'sometimes|string|max:255',
            'country' => 'sometimes|string|max:255',
            'postal_code' => 'sometimes|string|max:255',
            'default_price' => 'sometimes|numeric',
            'property_thumbnail' => 'nullable',
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'lowest_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
            'status' => 'sometimes',
        ]);
        $validatedData['status'] = $this->status;
        $validatedData['type'] = $this->type;

        if ($this->property_thumbnail && !is_string($this->property_thumbnail)) {
            try {
                $filename = 'property_thumbnail_' . time() . '_' . Str::slug($this->property_thumbnail->getClientOriginalName());
                $this->property_thumbnail->storeAs('public/properties', $filename);
                $validatedData['property_thumbnail'] = 'properties/' . $filename;
            } catch (\Exception $e) {
            }
        }


        $validatedData['landlord_id'] = $landlord_id;

        // dd($validatedData);
        $this->property->update($validatedData);
        session()->flash('message', 'Property Listing updated successfully');
        return redirect()->route('properties.edit', $this->property);
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('frontend.property-listings.property-form');
    }
}
