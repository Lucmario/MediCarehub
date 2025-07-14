@extends('layouts.app')
@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center" style="min-height:70vh;">
  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    <h2 class="mb-4 text-center">Connexion</h2>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required autofocus>
      </div>
      <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="mb-2 text-end">
        <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
      </div>
      <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>
    <div class="text-center my-3">
      <a href="{{ route('google.redirect') }}" class="btn w-100 d-flex align-items-center justify-content-center gap-2"
         style="background: linear-gradient(90deg, #4285F4 0%, #34A853 50%, #FBBC05 75%, #EA4335 100%); color: #fff; font-weight:600; border:none;">
        <i class="bi bi-google" style="font-size:1.2rem;"></i> Se connecter avec Google
      </a>
    </div>
    <div class="mt-3 text-center">
      <a href="{{ route('select.role') }}">Créer un compte</a>
    </div>
  </div>
</div>
@endsection