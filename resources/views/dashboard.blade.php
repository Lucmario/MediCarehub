@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card shadow-lg p-4">
                <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                        <i class="bi bi-person-circle" style="font-size:2.5rem;color:#0d6efd;"></i>
                    </div>
                    <div>
                        <h3 class="mb-0">Bonjour, {{ $user->firstname }} {{ $user->lastname }}</h3>
                        <small class="text-muted">Bienvenue sur votre espace patient MediConnectHub</small>
                    </div>
                </div>
                <hr>
                <h5 class="mb-3">Mon profil</h5>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Email :</strong> {{ $user->email }}
                    </div>
                    <div class="col-md-6">
                        <strong>Téléphone :</strong> {{ $patient->phone ?? '-' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Date de naissance :</strong> {{ $patient->birth_date ?? '-' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Genre :</strong> {{ $patient->gender ?? '-' }}
                    </div>
                </div>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm mt-2">Modifier mon profil</a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow p-3 h-100">
                <h5 class="mb-3"><i class="bi bi-calendar-check text-primary"></i> Mes prochains rendez-vous</h5>
                @if($appointments->count())
                    <ul class="list-group list-group-flush">
                        @foreach($appointments as $rdv)
                            <li class="list-group-item">
                                <strong>Date :</strong> {{ $rdv->date }}<br>
                                <strong>Médecin :</strong> {{ $rdv->doctor->user->firstname ?? '-' }} {{ $rdv->doctor->user->lastname ?? '' }}<br>
                                <strong>Motif :</strong> {{ $rdv->reason ?? '-' }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Aucun rendez-vous à venir.</p>
                @endif
                <a href="{{ route('appointments.index') }}" class="btn btn-link mt-2">Voir tous mes rendez-vous</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow p-3 h-100">
                <h5 class="mb-3"><i class="bi bi-journal-medical text-success"></i> Mes derniers dossiers médicaux</h5>
                @if($medicalRecords->count())
                    <ul class="list-group list-group-flush">
                        @foreach($medicalRecords as $record)
                            <li class="list-group-item">
                                <strong>Date :</strong> {{ $record->record_date ? $record->record_date->format('d/m/Y') : 'Non spécifiée' }}<br>
                                <strong>Description :</strong> {{ Str::limit($record->description, 50) }}<br>
                                <strong>Traitement :</strong> {{ $record->treatment ? Str::limit($record->treatment, 50) : 'Non spécifié' }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Aucun dossier médical récent.</p>
                @endif
                <a href="{{ route('medical-records.index') }}" class="btn btn-link mt-2">Voir tout mon dossier médical</a>
                <a href="{{ route('medical-records.create') }}" class="btn btn-success btn-sm mt-2">Ajouter un nouveau dossier médical</a>
            </div>
        </div>
    </div>
</div>
@endsection 