@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Ajouter un nouveau docteur</h1>

    <form action="{{ route('doctors.storeWithUser') }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf

        <h2 class="text-xl font-semibold">Informations utilisateur</h2>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label>Prénom</label>
                <input type="text" name="firstname" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label>Nom</label>
                <input type="text" name="lastname" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label>Mot de passe</label>
                <input type="password" name="password" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label>Confirmation</label>
                <input type="password" name="password_confirmation" class="w-full border rounded p-2" required>
            </div>
        </div>

        <hr class="my-6">

        <h2 class="text-xl font-semibold">Informations du docteur</h2>

        <div>
            <label>Spécialité</label>
            <input type="text" name="specialty" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label>Téléphone</label>
            <input type="text" name="phone" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Biographie</label>
            <textarea name="bio" class="w-full border rounded p-2" rows="4"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded">Ajouter</button>
    </form>
</div>
@endsection
