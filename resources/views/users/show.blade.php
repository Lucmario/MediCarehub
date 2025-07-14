@php
    $adminEmail = 'lucmariolokossou@gmail.com';
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails de l'utilisateur</h2>

    <p><strong>Prénom :</strong> {{ $user->firstname }}</p>
    <p><strong>Nom :</strong> {{ $user->lastname }}</p>
    <p><strong>Email :</strong> {{ $user->email }}</p>
    <p><strong>Rôle :</strong> 
        @if($user->email === $adminEmail)
            <span class="badge bg-danger">Admin</span>
        @else
            {{ $user->role->name ?? 'Non défini' }}
        @endif
    </p>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
