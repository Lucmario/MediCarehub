@php
    $adminEmail = 'lucmariolokossou@gmail.com';
@endphp
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier l'utilisateur</h2>

    @if($user->email === $adminEmail)
        <div class="alert alert-info mb-3">
            <strong>Attention :</strong> Le rôle de l'administrateur ne peut pas être modifié.
        </div>
    @endif

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        @include('users.form', ['user' => $user, 'adminEmail' => $adminEmail])

        <button type="submit" class="btn btn-success" @if($user->email === $adminEmail) disabled @endif>Mettre à jour</button>
    </form>
</div>
@endsection
