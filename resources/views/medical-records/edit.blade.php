@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Dossier Médical</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('medical-records.update', $medicalRecord) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" id="patient_id" class="form-control">
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $medicalRecord->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $medicalRecord->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="treatment">Traitement</label>
            <textarea name="treatment" id="treatment" class="form-control">{{ $medicalRecord->treatment }}</textarea>
        </div>
        <div class="form-group">
            <label for="record_date">Date</label>
            <input type="date" name="record_date" id="record_date" class="form-control" value="{{ $medicalRecord->record_date ? $medicalRecord->record_date->format('Y-m-d') : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection 