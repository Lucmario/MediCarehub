@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Historique des ordonnances délivrées</h2>
    <ul class="list-group mb-4">
        @foreach($deliveredPrescriptions as $ord)
            <li class="list-group-item">
                <strong>Consultation du {{ $ord->consultation->date_consultation ?? 'N/A' }}</strong> - {{ $ord->description }}<br>
                <span class="text-muted">Médicaments : {{ $ord->medicaments }}</span>
                <span class="float-end">Délivrée le {{ $ord->delivered_at ? \Carbon\Carbon::parse($ord->delivered_at)->format('d/m/Y H:i') : 'N/A' }}</span>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('pharmacist.dashboard') }}" class="btn btn-secondary">Retour au tableau de bord</a>
</div>
@endsection
