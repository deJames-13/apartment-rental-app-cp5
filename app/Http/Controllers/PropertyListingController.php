<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyListing\StoreRequest;
use App\Http\Requests\PropertyListing\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\PropertyListing;

class PropertyListingController extends Controller
{
    public function index()
    {
        $propertyListings = PropertyListing::all();
        return view('frontend.property-listings.index', compact('propertyListings'));
    }

    public function create()
    {
        return view('frontend.property-listings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ptype_id' => 'nullable|exists:property_types,id',
            'landlord_id' => 'required|exists:users,id',
            'property_name' => 'required|string|max:255',
            'property_status' => 'nullable|string|max:255',
            'no_of_floors' => 'required|integer',
            'no_of_units' => 'required|integer',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'default_price' => 'required|numeric',
            'property_thumbnail' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'lowest_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
        ]);
        PropertyListing::create($data);
        return redirect()->route('properties.create');
    }

    public function show(string $id)
    {
        $listing = PropertyListing::findOrFail($id);
        return view('frontend.property-listings.show', compact('listing'));
    }


    public function edit(string $id)
    {
        $listing = PropertyListing::findOrFail($id);
        return view('frontend.property-listings.edit', compact('listing'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $listing = PropertyListing::findOrFail($id);
        $listing->update($data);
        return redirect()->route('properties.create');
    }

    public function destroy(string $id)
    {
        // Soft delete
        PropertyListing::destroy($id);
        return redirect()->route('properties.create');
    }

    public function category()
    {
    }
    public function popular()
    {
    }
}
