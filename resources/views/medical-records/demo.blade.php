@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Démo d'enregistrement de dossier médical (Patient)</h2>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow p-4">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Titre du dossier</label>
                        <input type="text" class="form-control" placeholder="Ex : Bilan sanguin, Allergies, etc.">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description / Notes</label>
                        <textarea class="form-control" rows="3" placeholder="Ajoutez ici les détails importants, symptômes, antécédents..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fichier(s) médical(aux) (PDF, image, etc.)</label>
                        <input type="file" class="form-control" multiple disabled>
                        <small class="text-muted">(Démo : upload désactivé)</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sécurité du dossier</label>
                        <select class="form-control">
                            <option selected>Privé (visible uniquement par moi)</option>
                            <option>Partagé avec mon médecin</option>
                            <option>Partagé avec mon pharmacien</option>
                        </select>
                        <small class="text-muted">Vous pouvez contrôler qui a accès à ce dossier.</small>
                    </div>
                    <button type="button" class="btn btn-primary w-100" disabled>Enregistrer le dossier</button>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Quitter la démo</a>
    </div>
</div>
@endsection
