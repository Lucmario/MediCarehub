<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MedicalRecordController extends Controller
{
    public function index()
    {
        try {
            $user = auth()->user();
            // Si l'utilisateur est patient, ne voir que ses dossiers
            if ($user && $user->role && $user->role->name === 'patient') {
                $patient = \App\Models\Patient::where('user_id', $user->id)->first();
                $records = $patient ? MedicalRecord::where('patient_id', $patient->id)->with('patient')->get() : collect();
            } else {
                // Pour les autres rôles, voir tous les dossiers
                $records = MedicalRecord::with('patient')->get();
            }
            Log::info('Dossiers médicaux récupérés : ' . $records->count());
            return view('medical-records.index', compact('records'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des dossiers médicaux : ' . $e->getMessage());
            return redirect()->route('dashboard')->with('error', 'Une erreur est survenue lors de la récupération des dossiers médicaux.');
        }
    }

    public function create()
    {
        try {
            $patients = Patient::all();
            return view('medical-records.create', compact('patients'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création d\'un dossier médical : ' . $e->getMessage());
            return redirect()->route('medical-records.index')->with('error', 'Une erreur est survenue.');
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate(MedicalRecord::rules());
            MedicalRecord::create($validated);
            return redirect()->route('medical-records.index')->with('success', 'Dossier médical créé avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du dossier médical : ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de la création du dossier médical.');
        }
    }

    public function show(MedicalRecord $medicalRecord)
    {
        try {
            return view('medical-records.show', compact('medicalRecord'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'affichage du dossier médical : ' . $e->getMessage());
            return redirect()->route('medical-records.index')->with('error', 'Une erreur est survenue.');
        }
    }

    public function edit(MedicalRecord $medicalRecord)
    {
        try {
            $patients = Patient::all();
            return view('medical-records.edit', compact('medicalRecord', 'patients'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la modification du dossier médical : ' . $e->getMessage());
            return redirect()->route('medical-records.index')->with('error', 'Une erreur est survenue.');
        }
    }

    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        try {
            $validated = $request->validate(MedicalRecord::rules());
            $medicalRecord->update($validated);
            return redirect()->route('medical-records.index')->with('success', 'Dossier médical mis à jour avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour du dossier médical : ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de la mise à jour du dossier médical.');
        }
    }

    public function destroy(MedicalRecord $medicalRecord)
    {
        try {
            $medicalRecord->delete();
            return redirect()->route('medical-records.index')->with('success', 'Dossier médical supprimé avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression du dossier médical : ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de la suppression du dossier médical.');
        }
    }
}
