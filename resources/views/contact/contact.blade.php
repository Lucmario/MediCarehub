@extends('layouts.app')

@section('title', 'Contact - MediConnectHub')

@section('content')
<section class="py-16 px-6 bg-gray-100 text-center">
    <h1 class="text-4xl font-bold mb-6 text-blue-800">Contactez-nous</h1>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">Vous avez une question, une suggestion ou besoin d'assistance ? Remplissez le formulaire ci-dessous.</p>

    <form method="POST" action="#" class="max-w-xl mx-auto bg-white p-8 rounded shadow">
        @csrf
        <div class="mb-4 text-left">
            <label class="block text-gray-700">Nom complet</label>
            <input type="text" name="name" class="w-full mt-1 p-2 border rounded" required>
        </div>
        <div class="mb-4 text-left">
            <label class="block text-gray-700">Adresse e-mail</label>
            <input type="email" name="email" class="w-full mt-1 p-2 border rounded" required>
        </div>
        <div class="mb-4 text-left">
            <label class="block text-gray-700">Message</label>
            <textarea name="message" class="w-full mt-1 p-2 border rounded" rows="5" required></textarea>
        </div>
        <button type="submit" class="bg-blue-800 text-white px-6 py-2 rounded hover:bg-blue-700">
            <i class="bi bi-send"></i> Envoyer
        </button>
    </form>
</section>
@endsection
