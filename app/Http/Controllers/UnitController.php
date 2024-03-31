<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::paginate(10);
        return view('frontend.units.index', compact('units'));
    }

    public function create()
    {
        return view('frontend.units.create');
    }

    public function store(Request $request)
    {
        $data = $request->validated();
        Unit::create($data);
        return redirect()->route('units.create')->with('message', 'Unit created successfully');
    }

    public function show(string $id)
    {
        $unit = Unit::findOrFail($id);
        if ($unit->propertyListing->status === 'inactive' && $unit->propertyListing->landlord_id !== auth()->id()) {
            abort(403);
        }
        return view('frontend.units.show', compact('unit'));
    }

    public function edit(string $id)
    {
        $unit = Unit::findOrFail($id);
        if ($unit->propertyListing->landlord_id !== auth()->id()) {
            abort(403);
        }
        return view('frontend.units.edit', compact('unit'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validated();
        $unit = Unit::findOrFail($id);
        if ($unit->propertyListing->landlord_id !== auth()->id()) {
            abort(403);
        }
        $unit->update($data);
        return redirect()->route('units.edit', $id);
    }

    public function destroy(string $id)
    {
        // Soft delete
        $unit = Unit::findOrFail($id);
        if ($unit->propertyListing->landlord_id !== auth()->id()) {
            abort(403);
        }
        Unit::destroy($id);
        return redirect()->route('units.index');
    }

    public function category()
    {
    }

    public function popular()
    {
    }
}
