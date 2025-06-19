@extends('layouts.app')
@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center" style="min-height:70vh;">
  <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
    <h2 class="mb-4 text-center">Inscription Pharmacien</h2>
    <form method="POST" action="{{ route('register', ['role' => 'pharmacist']) }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Prénom</label>
        <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" required>
        @error('firstname')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" required>
        @error('lastname')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Téléphone</label>
        <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
        @error('phone')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Numéro d'officine</label>
        <input type="text" name="pharmacy_number" class="form-control @error('pharmacy_number') is-invalid @enderror" value="{{ old('pharmacy_number') }}" required>
        @error('pharmacy_number')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-info w-100">S'inscrire comme Pharmacien</button>
    </form>
    <div class="mt-3 text-center">
      <a href="{{ route('login') }}">Déjà inscrit ? Se connecter</a>
    </div>
  </div>
</div>
@endsection