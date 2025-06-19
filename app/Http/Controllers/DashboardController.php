<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\MedicalRecord;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $patient = Patient::where('user_id', $user->id)->first();

        // Récupérer les rendez-vous, consultations et dossiers médicaux du patient
        $appointments = $patient ? $patient->appointments()->latest()->take(5)->get() : collect();
        $consultations = $patient ? $patient->consultations()->latest()->take(5)->get() : collect();
        $medicalRecords = $patient ? MedicalRecord::where('patient_id', $patient->id)->latest()->take(5)->get() : collect();

        return view('dashboard', compact('user', 'patient', 'appointments', 'consultations', 'medicalRecords'));
    }
}

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class DashboardController extends Controller
// {
//     public function index()
//     {
        // // Données fictives pour la maquette
        // $upcomingAppointment = [
        //     'doctor' => 'Dr. Emily Smith',
        //     'specialty' => 'Cardiology',
        //     'date' => 'April 30, 2024 - 10:00 AM',
        // ];

        // $pastConsultations = [
        //     [
        //         'doctor' => 'Dr. James Johnson',
        //         'date' => 'April 15, 2024',
        //         'status' => 'Prescription Provided',
        //     ],
        //     // autres consultations si besoin
        // ];

//         $medicalRecord = [
//             'bloodPressure' => '120 / 80 mmHg',
//         ];

//         $amountDue = 50.00;

//         return view('dashboard', compact('upcomingAppointment', 'pastConsultations', 'medicalRecord', 'amountDue'));
//     }
// } -->
