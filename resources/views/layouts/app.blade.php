<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MediCareHub')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">MediCareHub</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">À propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                        <li class="nav-item"><a class="btn btn-primary ms-2" href="{{ route('register') }}">S’inscrire</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="#">{{ Auth::user()->name }}</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm ms-2">Déconnexion</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="container mb-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3">
        &copy; {{ date('Y') }} MediCareHub. Tous droits réservés.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MediCareHub')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    @stack('styles')
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Navbar combinée ici -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-teal-600">MediCareHub</a>
            <div class="space-x-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-teal-600">Accueil</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-teal-600">À propos</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-teal-600">Contact</a>
                <a href="{{ route('doctors.create') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded">
                    Ajouter un docteur
                </a>
                <a href="{{ route('login') }}" class="text-teal-600 font-semibold hover:underline">Connexion</a>
                <a href="{{ route('select.role') }}" class="bg-teal-500 hover:bg-teal-600 text-white py-1 px-4 rounded">S’inscrire</a>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-6 text-center">
        <p>&copy; {{ date('Y') }} MediCareHub. Tous droits réservés.</p>
    </footer>

    @stack('scripts')
</body>
</html> --}}


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
<html lang="f 

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
</html>--}}

