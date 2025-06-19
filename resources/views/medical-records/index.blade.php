@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dossiers Médicaux</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Description</th>
                <th>Traitement</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->patient->name }}</td>
                    <td>{{ $record->description }}</td>
                    <td>{{ $record->treatment }}</td>
                    <td>{{ $record->record_date ? $record->record_date->format('d/m/Y') : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('medical-records.edit', $record) }}" class="btn btn-sm btn-primary">Modifier</a>
                        <form action="{{ route('medical-records.destroy', $record) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('medical-records.create') }}" class="btn btn-success">Nouveau Dossier</a>
</div>
@endsection 