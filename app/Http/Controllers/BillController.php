<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Patient;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with('patient')->get();
        return view('bills.index', compact('bills'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('bills.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Bill::create($validated);
        return redirect()->route('bills.index')->with('success', 'Facture créée.');
    }

    public function show(Bill $bill)
    {
        return view('bills.show', compact('bill'));
    }

    public function edit(Bill $bill)
    {
        $patients = Patient::all();
        return view('bills.edit', compact('bill', 'patients'));
    }

    public function update(Request $request, Bill $bill)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $bill->update($validated);
        return redirect()->route('bills.index')->with('success', 'Facture mise à jour.');
    }

    public function destroy(Bill $bill)
    {
        $bill->delete();
        return redirect()->route('bills.index')->with('success', 'Facture supprimée.');
    }
}

