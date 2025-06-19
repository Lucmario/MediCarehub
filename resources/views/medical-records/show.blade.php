@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Détails du Dossier Médical</h1>
            <div>
                <a href="{{ route('medical-records.edit', $medicalRecord) }}" class="btn btn-primary">Modifier</a>
                <a href="{{ route('medical-records.index') }}" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Patient</h5>
                    <p>{{ $medicalRecord->patient->name }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Date</h5>
                    <p>{{ $medicalRecord->record_date ? $medicalRecord->record_date->format('d/m/Y') : 'Non spécifiée' }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <h5>Description</h5>
                    <p>{{ $medicalRecord->description }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5>Traitement</h5>
                    <p>{{ $medicalRecord->treatment ?: 'Aucun traitement spécifié' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 