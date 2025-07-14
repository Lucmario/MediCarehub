@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Démo de prescription de médicaments</h2>
    <div class="row justify-content-center mb-4">
        <div class="col-md-4">
            <div class="card shadow p-3 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <img src="https://ui-avatars.com/api/?name=Dr.+Jean+Martin&background=0d6efd&color=fff" class="rounded-circle me-3" width="48" height="48" alt="Médecin">
                    <div>
                        <strong>Dr. Jean Martin</strong><br>
                        <span class="text-muted">Cardiologue</span>
                    </div>
                </div>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Patient</label>
                        <input type="text" class="form-control" value="Krishna Lokossou" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Médicaments prescrits</label>
                        <textarea class="form-control" rows="3" placeholder="Ex : Paracétamol 500mg, 2x/jour pendant 5 jours"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Instructions</label>
                        <textarea class="form-control" rows="2" placeholder="Ex : Prendre après le repas"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary w-100" disabled>Envoyer la prescription</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow p-3 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <img src="https://ui-avatars.com/api/?name=Krishna+Lokossou&background=10b981&color=fff" class="rounded-circle me-3" width="48" height="48" alt="Patient">
                    <div>
                        <strong>Krishna Lokossou</strong><br>
                        <span class="text-muted">Patient</span>
                    </div>
                </div>
                <div class="alert alert-info mb-2">En attente de prescription...</div>
                <div class="card bg-light p-2">
                    <strong>Dernière prescription reçue :</strong><br>
                    <span class="text-muted">Aucune pour le moment</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow p-3 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <img src="https://ui-avatars.com/api/?name=Pharmacie+Zogbo&background=22c55e&color=fff" class="rounded-circle me-3" width="48" height="48" alt="Pharmacien">
                    <div>
                        <strong>Pharmacie Zogbo</strong><br>
                        <span class="text-muted">Pharmacien</span>
                    </div>
                </div>
                <div class="alert alert-warning mb-2">En attente de prescription à valider...</div>
                <div class="card bg-light p-2">
                    <strong>Dernière prescription délivrée :</strong><br>
                    <span class="text-muted">Aucune pour le moment</span>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Quitter la démo</a>
    </div>
</div>
@endsection
