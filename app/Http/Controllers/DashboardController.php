<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Simulations de données
        $rdv = [
            'medecin' => 'Dr. Jean Martin',
            'date' => '15 Juin 2023',
            'heure' => '14:30',
        ];

        $dossier = [
            'allergies' => 2,
            'traitements' => 3,
            'antecedents' => 'complet',
        ];

        $pharmacie = [
            'medicaments' => 2,
        ];

        return view('dashboard', compact('rdv', 'dossier', 'pharmacie'));
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
