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
        $medicalRecords = MedicalRecord::with('patient')->get();
        return view('admin.dashboard', compact('user', 'medicalRecords'));
    }
}
