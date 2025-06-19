@extends('layouts.app')
@section('content')
<div class="container py-5">
  <h2 class="mb-4">Inscription</h2>
  <form method="POST" action="{{ route('register', ['role' => $role ?? 'patient']) }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nom complet</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Mot de passe</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Confirmer le mot de passe</label>
      <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
  </form>
  <div class="mt-3 text-center">
    <a href="{{ route('login') }}">Déjà inscrit ? Se connecter</a>
  </div>
</div>
@endsection