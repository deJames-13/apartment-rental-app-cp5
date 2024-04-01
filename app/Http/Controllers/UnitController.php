<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
  public function index()
  {
    $search = request()->get('search');
    $unit_type = request()->get('unit_type');
    $location = request()->get('location');

    $units = Unit::search($search, $location, $unit_type)->paginate(10);

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

  public function destroy(Request $request)
  {
    // Soft delete
    $unit = Unit::findOrFail($request->id);
    if ($unit->propertyListing->landlord_id !== auth()->id()) {
      abort(403);
    }
    // Manually soft delete related leases
    foreach ($unit->leases as $lease) {
      $lease->delete();
    }
    $unit->delete();
    return redirect()->route('dashboard.units');
  }

  // Restore
  public function restore($id)
  {
    $unit = Unit::withTrashed()->findOrFail($id);
    if ($unit->propertyListing->landlord_id !== auth()->id()) {
      abort(403);
    }

    $unit->restore();
    foreach ($unit->leases()->withTrashed()->get() as $lease) {
      $lease->restore();
    }

    return redirect()->route('dashboard.units');
  }

  public function search()
  {
  }

  public function category()
  {
  }

  public function popular()
  {
  }
}
