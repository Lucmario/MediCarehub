@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Démo de visioconférence patient & médecin</h2>
    <div class="row justify-content-center mb-4">
        <div class="col-md-5">
            <div class="card shadow p-3 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <img src="https://ui-avatars.com/api/?name=Dr.+Jean+Martin&background=0d6efd&color=fff" class="rounded-circle me-3" width="48" height="48" alt="Médecin">
                    <div>
                        <strong>Dr. Jean Martin</strong><br>
                        <span class="text-muted">Cardiologue</span>
                    </div>
                </div>
                <div class="video-demo bg-dark rounded mb-2" style="height:220px;display:flex;align-items:center;justify-content:center;">
                    <span class="text-white-50">Flux vidéo du médecin</span>
                </div>
                <div class="text-end">
                    <span class="badge bg-success">Connecté</span>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow p-3 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <img src="https://ui-avatars.com/api/?name=Krishna+Lokossou&background=10b981&color=fff" class="rounded-circle me-3" width="48" height="48" alt="Patient">
                    <div>
                        <strong>Krishna Lokossou</strong><br>
                        <span class="text-muted">Patient</span>
                    </div>
                </div>
                <div class="video-demo bg-dark rounded mb-2" style="height:220px;display:flex;align-items:center;justify-content:center;">
                    <span class="text-white-50">Flux vidéo du patient</span>
                </div>
                <div class="text-end">
                    <span class="badge bg-success">Connecté</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow p-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-chat-dots me-2 text-primary"></i>
                    <strong>Chat en direct</strong>
                </div>
                <div class="bg-light rounded p-3 mb-2" style="height:120px;overflow-y:auto;">
                    <div><strong>Dr. Jean Martin :</strong> Bonjour Krishna, comment puis-je vous aider aujourd'hui ?</div>
                    <div class="text-end"><strong>Krishna :</strong> Bonjour docteur, j'ai des douleurs à la poitrine depuis ce matin.</div>
                </div>
                <form class="d-flex gap-2">
                    <input type="text" class="form-control" placeholder="Écrire un message..." disabled>
                    <button class="btn btn-primary" type="button" disabled>Envoyer</button>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Quitter la démo</a>
    </div>
</div>
@endsection

@push('styles')
<style>
.video-demo { background: repeating-linear-gradient(135deg, #222 0 10px, #333 10px 20px); }
</style>
@endpush
