@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Historique complet</h2>
    <h4 class="mt-4">Rendez-vous</h4>
    <ul class="list-group mb-4">
        @foreach($appointments as $rdv)
            <li class="list-group-item">
                {{ $rdv->patient->user->firstname }} {{ $rdv->patient->user->lastname }} le {{ \Carbon\Carbon::parse($rdv->date)->format('d/m/Y') }} à {{ $rdv->heure }} ({{ $rdv->statut }})
            </li>
        @endforeach
    </ul>
    <h4>Consultations</h4>
    <ul class="list-group mb-4">
        @foreach($consultations as $consult)
            <li class="list-group-item">
                {{ $consult->patient->user->firstname }} {{ $consult->patient->user->lastname }} le {{ \Carbon\Carbon::parse($consult->date_consultation)->format('d/m/Y') }}
            </li>
        @endforeach
    </ul>
    <h4>Ordonnances</h4>
    <ul class="list-group mb-4">
        @foreach($prescriptions as $ord)
            <li class="list-group-item">
                <strong>Consultation du {{ $ord->consultation->date_consultation ?? 'N/A' }}</strong> - {{ $ord->description }}
            </li>
        @endforeach
    </ul>
    <a href="{{ route('doctor.dashboard') }}" class="btn btn-secondary">Retour au tableau de bord</a>
</div>
@endsection
