@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Liste des Docteurs</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($doctors as $doctor)
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-semibold text-teal-700">{{ $doctor->user->firstname }} {{ $doctor->user->lastname }}</h2>
                <p class="text-gray-600 text-sm">{{ $doctor->specialty }}</p>
                <p class="text-sm text-gray-500 mt-2">{{ $doctor->bio }}</p>
                <p class="text-sm mt-2">📞 {{ $doctor->phone ?? 'Non renseigné' }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
