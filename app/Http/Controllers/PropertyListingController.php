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
        $propertyListings = PropertyListing::paginate(10)->sortByDesc('created_at');
        return view('frontend.property-listings.index', compact('propertyListings'));
    }

    public function create()
    {
        return view('frontend.property-listings.create');
    }

    public function store(StoreRequest $request)
    {
        dd($request->all());
        $data = $request->validated();
        PropertyListing::create($$data);
        return redirect()->route('properties.create')->with('message', 'Property Listing created successfully');
    }

    public function show(string $id)
    {
        $property = PropertyListing::findOrFail($id);
        return view('frontend.property-listings.show', compact('property'));
    }


    public function edit(string $id)
    {
        $property = PropertyListing::findOrFail($id);
        return view('frontend.property-listings.edit', compact('property'));
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
