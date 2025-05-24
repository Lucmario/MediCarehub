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
                <td>{{ $user->role->name ?? 'Non défini' }}</td>
                <td>
                    <a href="{{ route('users.show', $user) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
