@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h2 class="mb-4">Gestion des rendez-vous</h2>
    <div class="mb-4">
        <form method="GET" class="row g-2 align-items-end">
            <div class="col-md-3">
                <label for="patient_id" class="form-label">Patient</label>
                <select name="patient_id" id="patient_id" class="form-select">
                    <option value="">Tous</option>
                    @foreach($patients as $pat)
                        <option value="{{ $pat->id }}" @if(request('patient_id') == $pat->id) selected @endif>
                            {{ $pat->user->firstname ?? '' }} {{ $pat->user->lastname ?? '' }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="doctor_id" class="form-label">Médecin</label>
                <select name="doctor_id" id="doctor_id" class="form-select">
                    <option value="">Tous</option>
                    @foreach($doctors as $doc)
                        <option value="{{ $doc->id }}" @if(request('doctor_id') == $doc->id) selected @endif>
                            Dr {{ $doc->user->firstname ?? '' }} {{ $doc->user->lastname ?? '' }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-2">
                <label for="statut" class="form-label">Statut</label>
                <select name="statut" id="statut" class="form-select">
                    <option value="">Tous</option>
                    <option value="pending" @if(request('statut')=='pending') selected @endif>En attente</option>
                    <option value="confirmé" @if(request('statut')=='confirmé') selected @endif>Confirmé</option>
                    <option value="refusé" @if(request('statut')=='refusé') selected @endif>Refusé</option>
                    <option value="annulé" @if(request('statut')=='annulé') selected @endif>Annulé</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filtrer</button>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Patient</th>
                <th>Médecin</th>
                <th>Date & Heure</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($appointments as $rdv)
            <tr>
                <td>{{ $rdv->id }}</td>
                <td>{{ $rdv->patient->user->firstname ?? '' }} {{ $rdv->patient->user->lastname ?? '' }}</td>
                <td>Dr {{ $rdv->doctor->user->firstname ?? '' }} {{ $rdv->doctor->user->lastname ?? '' }}</td>
                <td>{{ \Carbon\Carbon::parse($rdv->appointment_date)->format('d/m/Y H:i') }}</td>
                <td>{{ ucfirst($rdv->status) }}</td>
                <td>
                    <a href="{{ route('admin.appointments.edit', $rdv->id) }}" class="btn btn-primary btn-sm me-1">Modifier</a>
                    <form method="POST" action="{{ route('admin.appointments.delete', $rdv->id) }}" style="display:inline" onsubmit="return confirm('Supprimer ce rendez-vous ?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7" class="text-center">Aucun rendez-vous trouvé.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection 