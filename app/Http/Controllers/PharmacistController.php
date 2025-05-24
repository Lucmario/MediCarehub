<?php

namespace App\Http\Controllers;

use App\Models\Pharmacist;
use App\Models\User;
use Illuminate\Http\Request;

class PharmacistController extends Controller
{
    public function index()
    {
        $pharmacists = Pharmacist::with('user')->get();
        return view('pharmacists.index', compact('pharmacists'));
    }

    public function create()
    {
        $users = User::all();
        return view('pharmacists.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        Pharmacist::create($request->all());

        return redirect()->route('pharmacists.index')->with('success', 'Pharmacien ajouté.');
    }

    public function show(Pharmacist $pharmacist)
    {
        return view('pharmacists.show', compact('pharmacist'));
    }

    public function edit(Pharmacist $pharmacist)
    {
        $users = User::all();
        return view('pharmacists.edit', compact('pharmacist', 'users'));
    }

    public function update(Request $request, Pharmacist $pharmacist)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $pharmacist->update($request->all());

        return redirect()->route('pharmacists.index')->with('success', 'Pharmacien mis à jour.');
    }

    public function destroy(Pharmacist $pharmacist)
    {
        $pharmacist->delete();
        return redirect()->route('pharmacists.index')->with('success', 'Pharmacien supprimé.');
    }
}
