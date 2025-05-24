{{-- <!DOCr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- Barre de navigation Bootstrap --}}
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MediCare Hub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('patients.index') }}">Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('doctors.index') }}">Docteurs</a>
                    </li> --}}
                    <!-- Ajoute d'autres liens ici selon tes routes -->
                {{-- ul>
            </div>
        </div>
    </</nav> --}}

    {{-- Contenu principal --}}
    {{-- <div class="container">
        @yield('content')
    </div>

</body>
</html>TYPE html>
<html lang="f --}}

<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MediCareHub')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <!-- Navigation -->
<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-teal-600">MediCareHub</a>
        <div class="space-x-6">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-teal-600">Accueil</a>
            <a href="{{ route('about') }}" class="text-gray-700 hover:text-teal-600">À propos</a>
            <a href="{{ route('contact') }}" class="text-gray-700 hover:text-teal-600">Contact</a>
            <a href="{{ route('doctors.create') }}" class="btn btn-success">Ajouter un docteur</a>
            <a href="{{ route('login') }}" class="text-teal-600 font-semibold hover:underline">Connexion</a>
            <a href="{{ route('select.role') }}" class="bg-teal-500 hover:bg-teal-600 text-white py-1 px-4 rounded">S’inscrire</a>
        </div>
    </div>
</nav>


    @yield('content')

    <footer class="bg-blue-900 text-white py-6 text-center">
        <p>&copy; {{ date('Y') }} MediCareHub. Tous droits réservés.</p>
    </footer>

</body>
</html>

