<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyListing;
use App\Models\LeaseApplication;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $applications = LeaseApplication::all();
    return view('dashboard.applications.index', compact('applications'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function new()
  {
    // if there is an id get the property
    return view('frontend.applications.create');
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id = null)
  {
    // if there is an id get the property
    $property = PropertyListing::find($id) ?? null;
    return view('frontend.applications.create', compact('property'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // Validate the request
    $request->validate([
      'tenant_id' => 'required',
      'landlord_id' => 'required',
      'property_id' => 'required',
      'unit_id' => 'required',
      'title' => 'nullable',
      'start_date' => 'required|date',
      'end_date' => 'required|date',
      'rent_amount' => 'required|numeric',
      'status' => 'required|in:active,inactive',
      'notes' => 'nullable',
      'tenant_id_card' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Upload files
    $tenantIdCardPath = $request->file('tenant_id_card') ? $request->file('tenant_id_card')->store('public/applications') : null;
    $signaturePath = $request->file('signature') ? $request->file('signature')->store('public/applications') : null;

    $application = LeaseApplication::create(array_merge(
      $request->except(['tenant_id_card', 'signature']),
      [
        'tenant_id_card' => $tenantIdCardPath,
        'signature' => $signaturePath,
      ]
    ));

    return redirect()->route('applications.index')
      ->with('success', 'Lease application created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $application = LeaseApplication::findOrFail($id);
    return view('frontend.applications.show', compact('application'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $application = LeaseApplication::with('tenant', 'landlord', 'propertyListing', 'unit')->findOrFail($id);
    return view('frontend.applications.edit', compact('application'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // Validate the request
    $request->validate([
      'tenant_id' => 'required',
      'landlord_id' => 'required',
      'property_id' => 'required',
      'unit_id' => 'required',
      'title' => 'nullable',
      'start_date' => 'required|date',
      'end_date' => 'required|date',
      'rent_amount' => 'required|numeric',
      'status' => 'required|in:active,inactive',
      'notes' => 'nullable',
      'tenant_id_card' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the application and update
    $application = LeaseApplication::findOrFail($id);

    // Update file paths if new files are uploaded
    $tenantIdCardPath = $application->tenant_id_card;
    $signaturePath = $application->signature;
    if ($request->file('tenant_id_card')) {
      $tenantIdCardPath = $request->file('tenant_id_card')->store('public/applications');
      Storage::delete($application->tenant_id_card); // Delete old file
    }
    if ($request->file('signature')) {
      $signaturePath = $request->file('signature')->store('public/applications');
      Storage::delete($application->signature); // Delete old file
    }

    $application->update(array_merge(
      $request->except(['tenant_id_card', 'signature']),
      [
        'tenant_id_card' => $tenantIdCardPath,
        'signature' => $signaturePath,
      ]
    ));

    return redirect()->route('applications.index')
      ->with('success', 'Lease application updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $application = LeaseApplication::findOrFail($id);
    Storage::delete([$application->tenant_id_card, $application->signature]);
    $application->delete();

    return redirect()->route('applications.index')
      ->with('success', 'Lease application deleted successfully.');
  }
}
