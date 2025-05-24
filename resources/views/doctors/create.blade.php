@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 max-w-2xl">
    <h2 class="text-2xl font-bold mb-6">Ajouter un docteur</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('doctors.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="user_id" class="block font-medium">Utilisateur</label>
            <select name="user_id" id="user_id" required class="w-full border-gray-300 rounded p-2">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="specialty" class="block font-medium">Spécialité</label>
            <input type="text" name="specialty" id="specialty" required class="w-full border-gray-300 rounded p-2" placeholder="Ex : Cardiologue">
        </div>

        <div>
            <label for="phone" class="block font-medium">Téléphone</label>
            <input type="text" name="phone" id="phone" class="w-full border-gray-300 rounded p-2" placeholder="+229 xx xx xx xx">
        </div>

        <div>
            <label for="bio" class="block font-medium">Biographie</label>
            <textarea name="bio" id="bio" rows="4" class="w-full border-gray-300 rounded p-2" placeholder="Quelques mots sur le docteur..."></textarea>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Enregistrer le docteur
            </button>
        </div>
    </form>
</div>
@endsection

