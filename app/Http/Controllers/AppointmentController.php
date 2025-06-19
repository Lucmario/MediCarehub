<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('patient')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::with('user')->get();
        $doctorsBySpecialty = $doctors->groupBy(function($doctor) {
            return $doctor->specialty ?? 'Autre';
        });
        return view('appointments.create', compact('patients', 'doctorsBySpecialty'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'heure' => 'required',
            'reason' => 'nullable|string',
        ]);

        $user = Auth::user();
        $patient = $user->patient ?? null;
        if (!$patient) {
            return back()->withErrors(['error' => 'Impossible de trouver le patient connecté.']);
        }

        $appointment = new Appointment();
        $appointment->patient_id = $patient->id;
        $appointment->doctor_id = $validated['doctor_id'];
        $appointment->date = $validated['date'];
        $appointment->heure = $validated['heure'];
        $appointment->reason = $validated['reason'] ?? null;
        $appointment->statut = 'pending';
        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'Rendez-vous enregistré avec succès !');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        return view('appointments.edit', compact('appointment', 'patients'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date',
            'reason' => 'nullable|string',
        ]);

        $appointment->update($validated);
        return redirect()->route('appointments.index')->with('success', 'Rendez-vous mis à jour.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Rendez-vous supprimé.');
    }
}
