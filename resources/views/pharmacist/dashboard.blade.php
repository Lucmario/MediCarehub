@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Tableau de bord Pharmacien</h2>
    <p>Bienvenue sur votre espace pharmacien. Ici, vous pouvez valider et délivrer les ordonnances des patients.</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Ordonnances à délivrer</h5>
                    <p class="display-6">{{ $stats['to_validate'] ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Ordonnances délivrées</h5>
                    <p class="display-6">{{ $stats['delivered'] ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Patients servis</h5>
                    <p class="display-6">{{ $stats['patients'] ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>Ordonnances à délivrer</h4>
        @if($pendingPrescriptions->count())
            <ul class="list-group mb-3">
                @foreach($pendingPrescriptions as $ord)
                    <li class="list-group-item">
                        <strong>Consultation du {{ $ord->consultation->date_consultation ?? 'N/A' }}</strong><br>
                        <span>{{ $ord->description }}</span><br>
                        <span class="text-muted">Médicaments : {{ $ord->medicaments }}</span>
                        <form method="POST" action="#" class="d-inline ms-2">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Délivrer</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-info">Aucune ordonnance à délivrer.</div>
        @endif
    </div>

    <div class="mt-5">
        <h4>Patients récents</h4>
        @if($recentPatients->count())
            <ul class="list-group mb-3">
                @foreach($recentPatients as $pat)
                    <li class="list-group-item">
                        {{ $pat->user->firstname }} {{ $pat->user->lastname }}
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-info">Aucun patient récent.</div>
        @endif
    </div>

    @if(isset($upcomingAppointments) && $upcomingAppointments->count())
        @php
            $firstRdv = $upcomingAppointments->first();
            $room = 'rdv-' . ($firstRdv->id ?? '');
        @endphp
        <a href="{{ route('teleconsultation.room', ['room' => $room]) }}" class="btn btn-success mb-3">
            <i class="bi bi-camera-video"></i> Rejoindre la téléconsultation
        </a>
    @endif

    <div class="mt-5 text-end">
        <a href="{{ route('pharmacist.history') }}" class="btn btn-secondary">Voir l'historique complet</a>
    </div>
</div>
@endsection
