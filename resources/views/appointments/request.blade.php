@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Prendre rendez-vous</h2>
    <form method="GET" action="{{ route('appointments.request') }}">
        <div class="form-group mb-3">
            <label for="specialty">Choisissez une spécialité médicale :</label>
            <select name="specialty" id="specialty" class="form-control" required>
                <option value="">-- Sélectionner --</option>
                @foreach($specialties as $spec)
                    <option value="{{ $spec }}" {{ request('specialty') == $spec ? 'selected' : '' }}>{{ $spec }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Voir les médecins disponibles</button>
    </form>
    @if(isset($doctors))
        <hr>
        <h4>Médecins disponibles :</h4>
        @if($doctors->count())
            <ul class="list-group mb-3">
                @foreach($doctors as $doctor)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Dr {{ $doctor->user->firstname }} {{ $doctor->user->lastname }}
                        <form method="POST" action="{{ route('appointments.book') }}" class="d-inline-flex align-items-center ms-2">
                            @csrf
                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                            <input type="date" name="date" class="form-control form-control-sm me-2" required>
                            <input type="time" name="heure" class="form-control form-control-sm me-2" required>
                            <button type="submit" class="btn btn-success btn-sm">Prendre RDV</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-warning">Aucun médecin disponible dans cette spécialité pour le moment.</div>
        @endif
    @endif
</div>
@endsection
