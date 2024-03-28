<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyListing\StoreRequest;
use App\Http\Requests\PropertyListing\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\PropertyListing;

class PropertyListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propertyListings = PropertyListing::all();
        return view('property-listings.index', compact('propertyListings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('property-listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        PropertyListing::create($data);
        return redirect()->route('property-listings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listing = PropertyListing::findOrFail($id);
        return view('property-listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = PropertyListing::findOrFail($id);
        return view('property-listings.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $listing = PropertyListing::findOrFail($id);
        $listing->update($data);
        return redirect()->route('property-listings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Soft delete
        PropertyListing::destroy($id);
    }
}
