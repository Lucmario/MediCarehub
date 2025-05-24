@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un utilisateur</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        @include('users.form', ['user' => null])

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
