@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h2 class="mb-4">Modifier le rendez-vous #{{ $appointment->id }}</h2>
    <form method="POST" action="{{ route('admin.appointments.update', $appointment->id) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Patient</label>
            <input type="text" class="form-control" value="{{ $appointment->patient->user->firstname ?? '' }} {{ $appointment->patient->user->lastname ?? '' }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Médecin</label>
            <input type="text" class="form-control" value="Dr {{ $appointment->doctor->user->firstname ?? '' }} {{ $appointment->doctor->user->lastname ?? '' }}" disabled>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $appointment->date }}" required>
        </div>
        <div class="mb-3">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" name="heure" id="heure" class="form-control" value="{{ $appointment->heure }}" required>
        </div>
        <div class="mb-3">
            <label for="statut" class="form-label">Statut</label>
            <select name="statut" id="statut" class="form-control" required>
                <option value="pending" @if($appointment->statut=='pending') selected @endif>En attente</option>
                <option value="confirmé" @if($appointment->statut=='confirmé') selected @endif>Confirmé</option>
                <option value="refusé" @if($appointment->statut=='refusé') selected @endif>Refusé</option>
                <option value="annulé" @if($appointment->statut=='annulé') selected @endif>Annulé</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.appointments') }}" class="btn btn-secondary ms-2">Annuler</a>
    </form>
</div>
@endsection 