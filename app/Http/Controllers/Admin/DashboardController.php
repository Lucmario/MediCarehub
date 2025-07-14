<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\MedicalRecord;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $adminEmail = 'lucmariolokossou@gmail.com'; // Email admin
        if (!$user || $user->email !== $adminEmail) {
            abort(403, 'Accès refusé.');
        }
        $medicalRecords = MedicalRecord::with('patient')->get();
        return view('admin.dashboard', compact('user', 'medicalRecords'));
    }

    public function appointments(\Illuminate\Http\Request $request)
    {
        $user = Auth::user();
        $adminEmail = 'lucmariolokossou@gmail.com';
        if (!$user || $user->email !== $adminEmail) {
            abort(403, 'Accès refusé.');
        }
        $patients = \App\Models\Patient::with('user')->get();
        $doctors = \App\Models\Doctor::with('user')->get();
        $query = \App\Models\Appointment::with(['patient.user', 'doctor.user']);
        if ($request->filled('patient_id')) {
            $query->where('patient_id', $request->patient_id);
        }
        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', $request->doctor_id);
        }
        if ($request->filled('statut')) {
            $query->where('status', $request->statut);
        }
        if ($request->filled('date')) {
            $query->whereDate('appointment_date', $request->date);
        }
        $appointments = $query->orderByDesc('appointment_date')->get();
        return view('admin.appointments', compact('user', 'appointments', 'patients', 'doctors'));
    }

    public function destroyAppointment($id)
    {
        $user = Auth::user();
        $adminEmail = 'lucmariolokossou@gmail.com';
        if (!$user || $user->email !== $adminEmail) {
            abort(403, 'Accès refusé.');
        }
        $appointment = \App\Models\Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('admin.appointments')->with('success', 'Rendez-vous supprimé avec succès.');
    }

    public function editAppointment($id)
    {
        $user = Auth::user();
        $adminEmail = 'lucmariolokossou@gmail.com';
        if (!$user || $user->email !== $adminEmail) {
            abort(403, 'Accès refusé.');
        }
        $appointment = \App\Models\Appointment::with(['patient.user', 'doctor.user'])->findOrFail($id);
        return view('admin.edit-appointment', compact('user', 'appointment'));
    }

    public function updateAppointment(\Illuminate\Http\Request $request, $id)
    {
        $user = Auth::user();
        $adminEmail = 'lucmariolokossou@gmail.com';
        if (!$user || $user->email !== $adminEmail) {
            abort(403, 'Accès refusé.');
        }
        $validated = $request->validate([
            'date' => 'required|date',
            'heure' => 'required',
            'statut' => 'required|string',
        ]);
        $appointment = \App\Models\Appointment::findOrFail($id);
        $appointment->update($validated);
        return redirect()->route('admin.appointments')->with('success', 'Rendez-vous modifié avec succès.');
    }
}
