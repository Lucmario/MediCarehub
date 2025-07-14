<?php

namespace App\Http\Controllers;

use App\Models\Pharmacist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function dashboardPharmacist()
    {
        $user = Auth::user();
        $pharmacist = $user->pharmacist ?? null;
        $stats = [
            'to_validate' => 0,
            'delivered' => 0,
            'patients' => 0,
        ];
        $pendingPrescriptions = collect();
        $deliveredPrescriptions = collect();
        $recentPatients = collect();
        if ($pharmacist) {
            $pendingPrescriptions = \App\Models\Prescription::whereNull('delivered_at')->orderByDesc('id')->take(10)->get();
            $deliveredPrescriptions = \App\Models\Prescription::whereNotNull('delivered_at')->orderByDesc('delivered_at')->take(10)->get();
            $stats['to_validate'] = $pendingPrescriptions->count();
            $stats['delivered'] = \App\Models\Prescription::whereNotNull('delivered_at')->count();
            $stats['patients'] = \App\Models\Prescription::whereNotNull('delivered_at')->distinct('consultation_id')->count('consultation_id');
            $recentPatients = \App\Models\Patient::whereIn('id',
                \App\Models\Consultation::whereIn('id', $deliveredPrescriptions->pluck('consultation_id'))
                ->pluck('patient_id')->unique()
            )->with('user')->get();
        }
        return view('pharmacist.dashboard', compact('stats', 'pendingPrescriptions', 'deliveredPrescriptions', 'recentPatients'));
    }

    public function history()
    {
        $user = Auth::user();
        $pharmacist = $user->pharmacist ?? null;
        $deliveredPrescriptions = collect();
        if ($pharmacist) {
            $deliveredPrescriptions = \App\Models\Prescription::whereNotNull('delivered_at')->orderByDesc('delivered_at')->get();
        }
        return view('pharmacist.history', compact('deliveredPrescriptions'));
    }
}
