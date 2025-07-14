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

        // Validation : pas de rendez-vous dans le passé
        $rdvDateTime = \Carbon\Carbon::parse($validated['date'].' '.$validated['heure']);
        if ($rdvDateTime->isPast()) {
            return back()->withErrors(['error' => 'Vous ne pouvez pas prendre un rendez-vous dans le passé.']);
        }

        // Validation : pas de doublon pour le médecin à ce créneau
        $exists = \App\Models\Appointment::where('doctor_id', $validated['doctor_id'])
            ->where('date', $validated['date'])
            ->where('heure', $validated['heure'])
            ->exists();
        if ($exists) {
            return back()->withErrors(['error' => 'Ce créneau est déjà réservé pour ce médecin.']);
        }

        // Limite : un patient ne peut pas prendre plus d'un rendez-vous avec le même médecin le même jour
        $rdvCount = \App\Models\Appointment::where('patient_id', $patient->id)
            ->where('doctor_id', $validated['doctor_id'])
            ->where('date', $validated['date'])
            ->count();
        if ($rdvCount > 0) {
            return back()->withErrors(['error' => 'Vous avez déjà un rendez-vous avec ce médecin à cette date.']);
        }

        $appointment = new Appointment();
        $appointment->patient_id = $patient->id;
        $appointment->doctor_id = $validated['doctor_id'];
        $appointment->date = $validated['date'];
        $appointment->heure = $validated['heure'];
        $appointment->reason = $validated['reason'] ?? null;
        $appointment->statut = 'pending';
        $appointment->save();

        // Message de confirmation détaillé
        $doctorName = $appointment->doctor->user->firstname . ' ' . $appointment->doctor->user->lastname;
        $date = \Carbon\Carbon::parse($appointment->date)->format('d/m/Y');
        $heure = $appointment->heure;
        $successMsg = "Votre rendez-vous avec Dr $doctorName le $date à $heure a bien été enregistré !";

        return redirect()->route('appointments.index')->with('success', $successMsg);
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

    public function requestForm(Request $request)
    {
        // Récupérer toutes les spécialités distinctes
        $specialties = \App\Models\Doctor::query()
            ->whereNotNull('specialty')
            ->pluck('specialty')
            ->unique()
            ->values();
        $doctors = collect();
        if ($request->filled('specialty')) {
            $doctors = \App\Models\Doctor::with('user')
                ->where('specialty', $request->specialty)
                ->get();
        }
        return view('appointments.request', compact('specialties', 'doctors'));
    }

    public function book(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'heure' => 'required',
        ]);
        $user = Auth::user();
        $patient = $user->patient ?? null;
        if (!$patient) {
            return back()->with('error', 'Impossible de trouver votre profil patient.');
        }
        // Vérifier si le médecin est déjà occupé à ce créneau
        $exists = \App\Models\Appointment::where('doctor_id', $validated['doctor_id'])
            ->where('date', $validated['date'])
            ->where('heure', $validated['heure'])
            ->exists();
        if ($exists) {
            return back()->with('error', 'Ce créneau est déjà réservé pour ce médecin.');
        }
        \App\Models\Appointment::create([
            'doctor_id' => $validated['doctor_id'],
            'patient_id' => $patient->id,
            'date' => $validated['date'],
            'heure' => $validated['heure'],
        ]);
        return back()->with('success', 'Rendez-vous pris avec succès !');
    }
}
