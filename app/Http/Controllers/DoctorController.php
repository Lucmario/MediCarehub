<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')->get();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        // On récupère uniquement les utilisateurs qui ne sont pas encore docteurs
        $users = User::doesntHave('doctor')->get();
        return view('doctors.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:doctors,user_id',
            'specialty' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        Doctor::create($request->only('user_id', 'specialty', 'phone', 'bio'));

        return redirect()->route('doctors.index')->with('success', 'Docteur ajouté avec succès.');
    }

    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        $users = User::all();
        return view('doctors.edit', compact('doctor', 'users'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'specialty' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $doctor->update($request->only('specialty', 'phone', 'bio'));

        return redirect()->route('doctors.index')->with('success', 'Docteur mis à jour.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Docteur supprimé.');
    }
}
