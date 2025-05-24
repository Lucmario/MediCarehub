<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $records = MedicalRecord::with('patient')->get();
        return view('medical-records.index', compact('records'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('medical-records.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'diagnosis' => 'required|string',
            'treatment' => 'nullable|string',
        ]);

        MedicalRecord::create($validated);
        return redirect()->route('medical-records.index')->with('success', 'Dossier médical enregistré.');
    }

    public function show(MedicalRecord $medicalRecord)
    {
        return view('medical-records.show', compact('medicalRecord'));
    }

    public function edit(MedicalRecord $medicalRecord)
    {
        $patients = Patient::all();
        return view('medical-records.edit', compact('medicalRecord', 'patients'));
    }

    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'diagnosis' => 'required|string',
            'treatment' => 'nullable|string',
        ]);

        $medicalRecord->update($validated);
        return redirect()->route('medical-records.index')->with('success', 'Dossier mis à jour.');
    }

    public function destroy(MedicalRecord $medicalRecord)
    {
        $medicalRecord->delete();
        return redirect()->route('medical-records.index')->with('success', 'Dossier supprimé.');
    }
}
