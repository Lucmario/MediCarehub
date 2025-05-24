@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier l'utilisateur</h2>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        @include('users.form', ['user' => $user])

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
