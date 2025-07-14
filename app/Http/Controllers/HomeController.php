<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Pharmacy;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')->get(); // Affiche tous les médecins
        $hospitals = Hospital::all(['id','name','latitude','longitude','address','city','phone']);
        $pharmacies = Pharmacy::all(['id','name','latitude','longitude','address','city','phone']);
        return view('welcome', compact('doctors', 'hospitals', 'pharmacies'));
    }
}
