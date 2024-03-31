<?php

namespace App\Http\Controllers;

use App\Models\LeaseTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = LeaseTransaction::all();
        return view('dashboard.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        // Create new transaction
        $transaction = LeaseTransaction::create(array_merge(
            $request->except(['tenant_id_card', 'signature']),
            [
                'tenant_id_card' => $tenantIdCardPath,
                'signature' => $signaturePath,
            ]
        ));

        return redirect()->route('transactions.index')
            ->with('success', 'Lease transaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $transaction = LeaseTransaction::findOrFail($id);
        return view('frontend.transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $transaction = LeaseTransaction::findOrFail($id);
        return view('frontend.transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
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

        $transaction = LeaseTransaction::findOrFail($id);

        // Update file paths if new files are uploaded
        $tenantIdCardPath = $transaction->tenant_id_card;
        $signaturePath = $transaction->signature;
        if ($request->file('tenant_id_card')) {
            $tenantIdCardPath = $request->file('tenant_id_card')->store('public/applications');
            Storage::delete($transaction->tenant_id_card);
        }
        if ($request->file('signature')) {
            $signaturePath = $request->file('signature')->store('public/applications');
            Storage::delete($transaction->signature);
        }

        $transaction->update(array_merge(
            $request->except(['tenant_id_card', 'signature']),
            [
                'tenant_id_card' => $tenantIdCardPath,
                'signature' => $signaturePath,
            ]
        ));

        return redirect()->route('transactions.index')
            ->with('success', 'Lease transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $transaction = LeaseTransaction::findOrFail($id);
        Storage::delete([$transaction->tenant_id_card, $transaction->signature]); // Delete associated files
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Lease transaction deleted successfully.');
    }
}
