@extends('layouts.app')

@section('title', 'À propos - MediCareHub')

@section('content')
<section class="py-16 px-6 bg-white text-center">
    <h1 class="text-4xl font-bold mb-6 text-blue-800">À propos de MediCareHub</h1>
    <p class="max-w-4xl mx-auto text-lg text-gray-700">
        MediCareHub est une plateforme de santé connectée conçue pour rapprocher les patients des professionnels de santé. 
        Grâce à nos solutions de téléconsultation, gestion des ordonnances et dossiers médicaux numériques, nous facilitons l'accès aux soins, même à distance.
    </p>

    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
        <div>
            <i class="bi bi-people text-teal-600 text-3xl mb-2"></i>
            <h3 class="font-bold text-lg">Notre mission</h3>
            <p class="text-gray-600">Améliorer l’accès aux soins à travers des technologies simples et efficaces.</p>
        </div>
        <div>
            <i class="bi bi-globe text-teal-600 text-3xl mb-2"></i>
            <h3 class="font-bold text-lg">Notre vision</h3>
            <p class="text-gray-600">Rendre les soins accessibles à tous, partout dans le monde.</p>
        </div>
        <div>
            <i class="bi bi-heart-pulse text-teal-600 text-3xl mb-2"></i>
            <h3 class="font-bold text-lg">Nos valeurs</h3>
            <p class="text-gray-600">Innovation, respect du patient, sécurité des données et éthique médicale.</p>
        </div>
    </div>
</section>
@endsection
