@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-4">
                <h2 class="mb-4 text-center">Prendre un rendez-vous</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('appointments.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">Médecin</label>
                        <select name="doctor_id" id="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror" required>
                            <option value="">-- Choisir un médecin --</option>
                            @foreach($doctorsBySpecialty as $specialty => $doctors)
                                <optgroup label="{{ $specialty }}">
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">Dr. {{ $doctor->user->firstname }} {{ $doctor->user->lastname }} ({{ $specialty }})</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('doctor_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}" required>
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="heure" class="form-label">Heure</label>
                        <input type="time" name="heure" id="heure" class="form-control @error('heure') is-invalid @enderror" value="{{ old('heure') }}" required>
                        @error('heure')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Motif du rendez-vous (optionnel)</label>
                        <input type="text" name="reason" id="reason" class="form-control @error('reason') is-invalid @enderror" value="{{ old('reason') }}">
                        @error('reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Valider le rendez-vous</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 