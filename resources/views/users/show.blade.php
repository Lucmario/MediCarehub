@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails de l'utilisateur</h2>

    <p><strong>Prénom :</strong> {{ $user->firstname }}</p>
    <p><strong>Nom :</strong> {{ $user->lastname }}</p>
    <p><strong>Email :</strong> {{ $user->email }}</p>
    <p><strong>Rôle :</strong> {{ $user->role->name ?? 'Non défini' }}</p>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
