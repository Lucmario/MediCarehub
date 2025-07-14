@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Paiement FedaPay</h2>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form action="{{ route('fedapay.pay') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Montant (XOF)</label>
            <input type="number" class="form-control" id="amount" name="amount" min="100" required>
        </div>
        <button type="submit" class="btn btn-primary">Payer avec FedaPay</button>
    </form>
</div>
@endsection 