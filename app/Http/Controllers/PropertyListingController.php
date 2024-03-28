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

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        PropertyListing::create($data);
        return redirect()->route('property-all');
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
        return redirect()->route('property-all');
    }

    public function destroy(string $id)
    {
        // Soft delete
        PropertyListing::destroy($id);
        return redirect()->route('property-all');
    }
}
