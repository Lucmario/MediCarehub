<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Consultation;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with('consultation')->get();
        return view('prescriptions.index', compact('prescriptions'));
    }

    public function create()
    {
        $consultations = Consultation::all();
        return view('prescriptions.create', compact('consultations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'medicaments' => 'required|string',
            'instructions' => 'nullable|string',
        ]);

        Prescription::create($request->all());

        return redirect()->route('prescriptions.index')->with('success', 'Ordonnance enregistrée.');
    }

    public function show(Prescription $prescription)
    {
        return view('prescriptions.show', compact('prescription'));
    }

    public function edit(Prescription $prescription)
    {
        $consultations = Consultation::all();
        return view('prescriptions.edit', compact('prescription', 'consultations'));
    }

    public function update(Request $request, Prescription $prescription)
    {
        $request->validate([
            'medicaments' => 'required|string',
        ]);

        $prescription->update($request->all());

        return redirect()->route('prescriptions.index')->with('success', 'Ordonnance mise à jour.');
    }

    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return redirect()->route('prescriptions.index')->with('success', 'Ordonnance supprimée.');
    }
}
