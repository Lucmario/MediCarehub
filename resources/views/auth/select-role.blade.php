<!-- resources/views/auth/select-role.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Choisissez votre rôle</h2>
    <div class="row justify-content-center">
        <!-- Patient -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow text-center">
                <div class="card-body">
                    <i class="bi bi-person-fill text-primary" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Patient</h5>
                    <p class="card-text">Prenez rendez-vous, consultez vos ordonnances et suivez votre dossier médical en toute simplicité.</p>
                    <a href="{{ route('register.form', ['role' => 'patient']) }}" class="btn btn-primary btn-block">S'inscrire comme Patient</a>
                </div>
            </div>
        </div>
        <!-- Médecin -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow text-center">
                <div class="card-body">
                    <i class="bi bi-stethoscope text-success" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Médecin</h5>
                    <p class="card-text">Gérez vos consultations, prescriptions et accédez à l’historique médical de vos patients.</p>
                    <a href="{{ route('register.form', ['role' => 'doctor']) }}" class="btn btn-success btn-block">S'inscrire comme Médecin</a>
                </div>
            </div>
        </div>
        <!-- Pharmacien -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow text-center">
                <div class="card-body">
                    <i class="bi bi-capsule-pill text-info" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Pharmacien</h5>
                    <p class="card-text">Accédez aux prescriptions, validez les ordonnances et suivez la délivrance des médicaments.</p>
                    <a href="{{ route('register.form', ['role' => 'pharmacist']) }}" class="btn btn-info btn-block">S'inscrire comme Pharmacien</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection