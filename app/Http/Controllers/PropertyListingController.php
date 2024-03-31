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
        $propertyListings = PropertyListing::paginate(10);
        return view('frontend.property-listings.index', compact('propertyListings'));
    }
    public function dash()
    {
        $userId = auth()->id();
        $propertyListings = PropertyListing::where('landlord_id', $userId)
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('frontend.property-listings.index', compact('propertyListings'));
    }

    public function create()
    {
        return view('frontend.property-listings.create');
    }

    public function store(StoreRequest $request)
    {
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
        if ($property->landlord_id !== auth()->id()) {
            abort(403);
        }
        return view('frontend.property-listings.edit', compact('property'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $property = PropertyListing::findOrFail($id);
        if ($property->landlord_id !== auth()->id()) {
            abort(403);
        }
        $property->update($data);
        return redirect()->route('properties.create');
    }

    public function destroy(Request $request)
    {
        // Soft delete
        $property = PropertyListing::findOrFail($request->id);
        if ($property->landlord_id !== auth()->id()) {
            abort(403);
        }
        foreach ($property->units as $unit) {
            $unit->delete();
        }
        $property->delete();
        return redirect()->route('dashboard.properties');
    }
    public function restore(Request $request)
    {
        $property = PropertyListing::withTrashed()->findOrFail($request->id);
        if ($property->landlord_id !== auth()->id()) {
            abort(403);
        }
        $property->restore();
        foreach ($property->units()->withTrashed()->get() as $unit) {
            $unit->restore();
        }

        return redirect()->route('dashboard.properties');
    }

    public function category()
    {
    }
    public function popular()
    {
    }
}
