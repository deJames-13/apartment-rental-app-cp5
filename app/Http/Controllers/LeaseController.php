<?php

namespace App\Http\Controllers;

use App\Models\LeaseInfo;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leases = LeaseInfo::all();
        return view('frontend.lease-infos.index', compact('leases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.lease-infos.create');
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
            'unit_id' => 'required',
            'lease_type' => 'required',
            'lease_application_fee' => 'required|numeric',
            'lease_fee' => 'required|numeric',
            'security_deposit' => 'required|numeric',
            'short_term_rent' => 'required|numeric',
            'long_term_rent' => 'required|numeric',
            'termination_amount' => 'required|numeric',
            'is_termination_allowed' => 'required|boolean',
            'is_sub_leasing_allowed' => 'required|boolean',
            'status' => 'required|in:active,inactive',
        ]);

        LeaseInfo::create($request->all());
        return redirect()->route('leases.index')
            ->with('success', 'Lease information created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lease = LeaseInfo::findOrFail($id);
        return view('leases.show', compact('lease'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lease = LeaseInfo::findOrFail($id);
        return view('frontend.lease-infos.edit', compact('lease'));
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
        $request->validate([
            'lease_type' => 'required',
            'lease_application_fee' => 'required|numeric',
            'lease_fee' => 'required|numeric',
            'security_deposit' => 'required|numeric',
            'short_term_rent' => 'required|numeric',
            'long_term_rent' => 'required|numeric',
            'termination_amount' => 'required|numeric',
            'is_termination_allowed' => 'required|boolean',
            'is_sub_leasing_allowed' => 'required|boolean',
            'status' => 'required|in:active,inactive',
        ]);

        $lease = LeaseInfo::findOrFail($id);
        $lease->update($request->all());

        return redirect()->route('leases.index')
            ->with('success', 'Lease information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lease = LeaseInfo::findOrFail($id);
        $lease->delete();

        return redirect()->route('leases.index')
            ->with('success', 'Lease information deleted successfully.');
    }
}
