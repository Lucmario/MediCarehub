<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\User;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index()
    {
        $cashiers = Cashier::with('user')->get();
        return view('cashiers.index', compact('cashiers'));
    }

    public function create()
    {
        $users = User::all();
        return view('cashiers.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        Cashier::create($request->all());

        return redirect()->route('cashiers.index')->with('success', 'Caissier ajouté.');
    }

    public function show(Cashier $cashier)
    {
        return view('cashiers.show', compact('cashier'));
    }

    public function edit(Cashier $cashier)
    {
        $users = User::all();
        return view('cashiers.edit', compact('cashier', 'users'));
    }

    public function update(Request $request, Cashier $cashier)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $cashier->update($request->all());

        return redirect()->route('cashiers.index')->with('success', 'Caissier mis à jour.');
    }

    public function destroy(Cashier $cashier)
    {
        $cashier->delete();
        return redirect()->route('cashiers.index')->with('success', 'Caissier supprimé.');
    }
}
