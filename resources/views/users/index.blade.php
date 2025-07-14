@php
    $adminEmail = 'lucmariolokossou@gmail.com';
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des utilisateurs</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Ajouter un utilisateur</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->email === $adminEmail)
                        <span class="badge bg-danger">Admin</span>
                    @else
                        {{ $user->role->name ?? 'Non défini' }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('users.show', $user) }}" class="btn btn-info btn-sm">Voir</a>
                    @if($user->email !== $adminEmail)
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</button>
                        </form>
                    @else
                        <button class="btn btn-secondary btn-sm" disabled>Modifier</button>
                        <button class="btn btn-secondary btn-sm" disabled>Supprimer</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
