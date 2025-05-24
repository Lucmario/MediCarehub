<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')->take(6)->get(); // Limite à 6
        return view('welcome', compact('doctors'));
    }
}
