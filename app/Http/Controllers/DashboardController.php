<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Données fictives pour la maquette
        $upcomingAppointment = [
            'doctor' => 'Dr. Emily Smith',
            'specialty' => 'Cardiology',
            'date' => 'April 30, 2024 - 10:00 AM',
        ];

        $pastConsultations = [
            [
                'doctor' => 'Dr. James Johnson',
                'date' => 'April 15, 2024',
                'status' => 'Prescription Provided',
            ],
            // autres consultations si besoin
        ];

        $medicalRecord = [
            'bloodPressure' => '120 / 80 mmHg',
        ];

        $amountDue = 50.00;

        return view('dashboard', compact('upcomingAppointment', 'pastConsultations', 'medicalRecord', 'amountDue'));
    }
}
