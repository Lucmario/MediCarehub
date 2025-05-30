{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCareHub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-bg {
            background-image: url('https://images.unsplash.com/photo-1588776814546-d626a1a48fcd?auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="flex items-center space-x-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo MediCareHub" class="h-10 w-auto">
                <span class="text-xl font-bold text-blue-600">MediCareHub</span>
            </a>
            <div class="space-x-4">
                <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium">Fonctionnalités</a>
                <a href="#doctors" class="text-gray-700 hover:text-blue-600 font-medium">Médecins</a>
                <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
                <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Se connecter</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg h-screen flex items-center justify-center text-white">
        <div class="text-center px-6">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">La santé connectée à portée de main</h1>
            <p class="text-lg md:text-2xl mb-6">Prenez rendez-vous, consultez en ligne, gérez vos traitements facilement avec MediCareHub.</p>
            <a href="{{ route('register') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded shadow hover:bg-blue-700 transition">Rejoignez-nous</a>
        </div>
    </section>

    <!-- Fonctionnalités -->
    <section id="features" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Nos fonctionnalités</h2>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2">Consultation à distance</h3>
                    <p>Consultez un médecin sans vous déplacer via notre plateforme sécurisée de télémédecine.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2">Ordonnances numériques</h3>
                    <p>Recevez vos prescriptions en ligne, prêtes à être utilisées à la pharmacie ou imprimées.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2">Paiements intégrés</h3>
                    <p>Payez vos consultations et médicaments en ligne ou directement à l’hôpital.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Docteurs -->
    <section id="doctors" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Nos médecins</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($doctors as $doctor)
                    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition text-center">
                        <img src="{{ asset('storage/'.$doctor->user->avatar) }}" alt="Photo de {{ $doctor->user->firstname }}" class="w-24 h-24 rounded-full object-cover mx-auto mb-4">
                        <h3 class="text-xl font-semibold">{{ $doctor->user->firstname }} {{ $doctor->user->lastname }}</h3>
                        <p class="text-blue-600 font-medium">{{ $doctor->specialty }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Une question ?</h2>
            <p class="mb-6">Contactez notre équipe pour en savoir plus sur MediCareHub.</p>
            <a href="mailto:contact@medicarehub.com" class="px-6 py-3 bg-blue-600 text-white rounded shadow hover:bg-blue-700">Nous contacter</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} MediCareHub. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html> --}}

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>MediCareHub - Bienvenue</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Alpine.js pour le menu mobile -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- AOS (Animate On Scroll) -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <style>
    .hero-bg {
      background-image: url('https://images.unsplash.com/photo-1588776814546-d626a1a48fcd?auto=format&fit=crop&w=1470&q=80');
      background-size: cover;
      background-position: center;
    }
  </style>
</head>

<body class="bg-gray-100 text-gray-800 font-sans" x-data="{ open: false }">

  <!-- Navbar -->
  <header class="bg-white shadow fixed w-full z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-4">
      <div class="flex items-center space-x-3">
        <img src="/images/logo.png" alt="Logo MediCareHub" class="h-10 w-auto">
        <span class="text-2xl font-bold text-blue-800">MediCareHub</span>
      </div>

      <!-- Menu desktop -->
      <nav class="hidden md:flex space-x-4 items-center">
        <a href="#services" class="text-gray-700 hover:text-blue-700 font-medium">Services</a>
        <a href="#doctors" class="text-gray-700 hover:text-blue-700 font-medium">Docteurs</a>
        <a href="#about" class="text-gray-700 hover:text-blue-700 font-medium">À propos</a>
        <a href="{{ route('login') }}" class="text-white bg-teal-500 hover:bg-teal-600 px-4 py-2 rounded flex items-center gap-1">
          <i class="bi bi-box-arrow-in-right"></i> Connexion
        </a>
        <a href="{{ route('select.role') }}" class="text-teal-700 border border-teal-500 hover:bg-teal-100 px-4 py-2 rounded flex items-center gap-1">
          <i class="bi bi-person-plus"></i> S'inscrire
        </a>
      </nav>

      <!-- Burger menu -->
      <button class="md:hidden text-2xl text-blue-800" @click="open = !open" aria-label="Menu mobile">
        <i :class="open ? 'bi bi-x' : 'bi bi-list'"></i>
      </button>
    </div>

    <!-- Menu mobile -->
    <div class="md:hidden" x-show="open" @click.outside="open = false" x-transition>
      <div class="px-6 py-4 space-y-2 bg-white shadow">
        <a href="#services" class="block text-gray-700 hover:text-blue-700">Services</a>
        <a href="#doctors" class="block text-gray-700 hover:text-blue-700">Docteurs</a>
        <a href="#about" class="block text-gray-700 hover:text-blue-700">À propos</a>
        <a href="{{ route('login') }}" class="block text-white bg-teal-500 hover:bg-teal-600 px-4 py-2 rounded">
          <i class="bi bi-box-arrow-in-right"></i> Connexion
        </a>
        <a href="{{ route('select.role') }}" class="block text-teal-700 border border-teal-500 hover:bg-teal-100 px-4 py-2 rounded">
          <i class="bi bi-person-plus"></i> S'inscrire
        </a>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero-bg h-screen flex items-center justify-center text-white pt-20">
    <div class="bg-blue-900 bg-opacity-80 p-10 rounded-xl text-center max-w-3xl" data-aos="fade-up">
      <h1 class="text-5xl font-extrabold mb-4">Bienvenue sur <span class="text-teal-300">MediCareHub</span></h1>
      <p class="text-lg mb-6">Plateforme de santé connectée pour téléconsultations, ordonnances numériques et suivi patient.</p>
      <div class="flex justify-center gap-4 flex-wrap">
        <a href="{{ route('login') }}" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 px-6 rounded shadow-md">
          <i class="bi bi-box-arrow-in-right"></i> Connexion
        </a>
        <a href="{{ route('select.role') }}" class="bg-white hover:bg-gray-200 text-teal-700 font-semibold py-2 px-6 rounded shadow-md">
          <i class="bi bi-person-plus"></i> S'inscrire
        </a>
      </div>
    </div>
  </section>

  <!-- À propos -->
  <section id="about" class="py-16 px-6 bg-white text-center" data-aos="fade-up">
    <h2 class="text-3xl font-bold mb-6 text-blue-800">À propos de MediCareHub</h2>
    <p class="max-w-3xl mx-auto text-lg text-gray-700 leading-relaxed">
      MediCareHub est une solution numérique innovante qui facilite l’accès aux soins grâce à la téléconsultation, la gestion électronique des ordonnances et le suivi médical personnalisé.
    </p>
  </section>

  <!-- Nos Services -->
  <section id="services" class="py-16 px-6 bg-gray-100" data-aos="fade-up">
    <h2 class="text-3xl font-bold text-center text-blue-800 mb-10">Nos Services</h2>
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
      <div class="bg-white p-8 rounded shadow-lg hover:shadow-xl transition transform hover:scale-105">
        <i class="bi bi-camera-video text-4xl text-teal-500 mb-4"></i>
        <h3 class="text-xl font-semibold mb-2">Téléconsultation</h3>
        <p class="text-gray-600">Consultez des médecins certifiés à distance, en toute simplicité.</p>
      </div>
      <div class="bg-white p-8 rounded shadow-lg hover:shadow-xl transition transform hover:scale-105">
        <i class="bi bi-file-earmark-medical text-4xl text-teal-500 mb-4"></i>
        <h3 class="text-xl font-semibold mb-2">Ordonnances numériques</h3>
        <p class="text-gray-600">Recevez et gérez vos prescriptions médicales en ligne.</p>
      </div>
      <div class="bg-white p-8 rounded shadow-lg hover:shadow-xl transition transform hover:scale-105">
        <i class="bi bi-journal-medical text-4xl text-teal-500 mb-4"></i>
        <h3 class="text-xl font-semibold mb-2">Suivi médical</h3>
        <p class="text-gray-600">Accédez à votre dossier médical à tout moment, partout.</p>
      </div>
    </div>
  </section>

  <!-- Nos Docteurs -->
  <section id="doctors" class="py-16 px-6 bg-white" data-aos="fade-up">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-10 text-blue-800">Nos Docteurs</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($doctors as $doctor)
        <div class="bg-gray-100 rounded-lg p-6 shadow hover:shadow-lg transition">
          <div class="text-xl font-semibold text-teal-700">{{ $doctor->user->firstname }} {{ $doctor->user->lastname }}</div>
          <div class="text-sm text-gray-500">{{ $doctor->specialty }}</div>
          <p class="mt-4 text-gray-700 text-sm">{{ $doctor->bio }}</p>
          <p class="mt-2 text-gray-600">📞 {{ $doctor->phone ?? 'Non renseigné' }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="py-12 bg-blue-800 text-white text-center" data-aos="zoom-in">
    <h2 class="text-2xl font-bold mb-4">Rejoignez la révolution numérique en santé</h2>
    <a href="{{ route('select.role') }}" class="bg-white text-blue-800 font-semibold py-3 px-8 rounded shadow hover:bg-gray-100 transition">
      Créer un compte
    </a>
  </section>

  <!-- Footer -->
  <footer class="bg-blue-900 text-white py-6 text-center">
    <p>&copy; {{ date('Y') }} MediCareHub. Tous droits réservés.</p>
    <div class="mt-2 text-sm text-blue-200">
      <a href="#" class="hover:underline mx-2">Conditions d'utilisation</a> |
      <a href="#" class="hover:underline mx-2">Politique de confidentialité</a> |
      <a href="#" class="hover:underline mx-2">Contact</a>
    </div>
  </footer>

  <!-- Init AOS -->
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>

</body>
</html>
