@php
    $doctors = $doctors ?? collect();
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>MediConnectHub - Bienvenue</title>
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
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <style>
      .hero-bg {
    background-image: url('https://images.unsplash.com/photo-1550831107-1553da8c8464?auto=format&fit=crop&w=1500&q=80');
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
        <img src="/images/logo.png" alt="Logo MediConnectHub" class="h-10 w-auto">
        <span class="text-2xl font-bold text-blue-800">MediConnectHub</span>
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
      <h1 class="text-5xl font-extrabold mb-4">Bienvenue sur <span class="text-teal-300">MediConnectHub</span></h1>
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

  <!-- Comment ça marche -->
  <section class="py-16 px-6 bg-white" data-aos="fade-up">
    <h2 class="text-3xl font-bold text-center mb-10 text-blue-800">Comment ça marche ?</h2>
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
      <div class="bg-blue-50 p-6 rounded-lg shadow hover:shadow-lg transition flex flex-col items-center">
        <span class="text-4xl text-blue-600 mb-2"><i class="bi bi-calendar-check"></i></span>
        <h3 class="text-lg font-semibold mb-1">Prise de rendez-vous</h3>
        <p class="text-gray-600 text-sm">Réservez un créneau en ligne, recevez une confirmation immédiate.</p>
      </div>
      <div class="bg-teal-50 p-6 rounded-lg shadow hover:shadow-lg transition flex flex-col items-center">
        <span class="text-4xl text-teal-600 mb-2"><i class="bi bi-camera-video"></i></span>
        <h3 class="text-lg font-semibold mb-1">Téléconsultation</h3>
        <p class="text-gray-600 text-sm">Consultez votre médecin à distance, accédez à votre dossier médical sécurisé.</p>
      </div>
      <div class="bg-green-50 p-6 rounded-lg shadow hover:shadow-lg transition flex flex-col items-center">
        <span class="text-4xl text-green-600 mb-2"><i class="bi bi-capsule"></i></span>
        <h3 class="text-lg font-semibold mb-1">Ordonnance & pharmacie</h3>
        <p class="text-gray-600 text-sm">Recevez une ordonnance numérique, retirez vos médicaments en pharmacie.</p>
      </div>
      <div class="bg-yellow-50 p-6 rounded-lg shadow hover:shadow-lg transition flex flex-col items-center">
        <span class="text-4xl text-yellow-600 mb-2"><i class="bi bi-credit-card"></i></span>
        <h3 class="text-lg font-semibold mb-1">Paiement sécurisé</h3>
        <p class="text-gray-600 text-sm">Payez en ligne via FedaPay ou sur place, confirmation instantanée.</p>
      </div>
    </div>
  </section>

  <!-- Section rôles -->
  <section class="py-16 px-6 bg-gray-100" data-aos="fade-up">
    <h2 class="text-3xl font-bold text-center mb-10 text-blue-800">Accès rapide selon votre profil</h2>
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
      <a href="{{ route('register.form', ['role' => 'patient']) }}" class="bg-blue-50 hover:bg-blue-100 border border-blue-200 p-8 rounded-lg shadow flex flex-col items-center transition">
        <span class="text-4xl text-blue-600 mb-2"><i class="bi bi-person"></i></span>
        <span class="font-semibold text-blue-800">Patient</span>
        <span class="text-xs text-gray-500 mt-2">Prendre RDV, consulter, payer</span>
      </a>
      <a href="{{ route('register.form', ['role' => 'doctor']) }}" class="bg-teal-50 hover:bg-teal-100 border border-teal-200 p-8 rounded-lg shadow flex flex-col items-center transition">
        <span class="text-4xl text-teal-600 mb-2"><i class="bi bi-stethoscope"></i></span>
        <span class="font-semibold text-teal-800">Médecin</span>
        <span class="text-xs text-gray-500 mt-2">Accéder aux dossiers, prescrire</span>
      </a>
      <a href="{{ route('register.form', ['role' => 'pharmacist']) }}" class="bg-green-50 hover:bg-green-100 border border-green-200 p-8 rounded-lg shadow flex flex-col items-center transition">
        <span class="text-4xl text-green-600 mb-2"><i class="bi bi-capsule"></i></span>
        <span class="font-semibold text-green-800">Pharmacien</span>
        <span class="text-xs text-gray-500 mt-2">Valider et délivrer les ordonnances</span>
      </a>
    </div>
  </section>

  <!-- À propos -->
  <section id="about" class="py-16 px-6 bg-white text-center" data-aos="fade-up">
    <h2 class="text-3xl font-bold mb-6 text-blue-800">À propos de MediConnectHub</h2>
    <p class="max-w-3xl mx-auto text-lg text-gray-700 leading-relaxed">
      MediConnectHub est une solution numérique innovante qui facilite l'accès aux soins grâce à la téléconsultation, la gestion électronique des ordonnances et le suivi médical personnalisé.
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

  <!-- Nos Docteurs (Carrousel Swiper) -->
  <section id="doctors" class="py-16 px-6 bg-white" data-aos="fade-up">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-10 text-blue-800">Nos Docteurs</h2>
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          @foreach ($doctors as $doctor)
          <div class="swiper-slide flex justify-center">
            <div class="bg-gray-100 rounded-lg p-6 shadow hover:shadow-lg transition w-full max-w-xs">
              <div class="text-xl font-semibold text-teal-700 mb-1">
                {{ $doctor->user->firstname }} {{ $doctor->user->lastname }}
              </div>
              <div class="text-sm text-gray-500 mb-2">
                @if(is_array($doctor->specialty) || is_object($doctor->specialty))
                  @foreach((array)$doctor->specialty as $spec)
                    <span class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs mr-1 mb-1">{{ $spec }}</span>
                  @endforeach
                @else
                  @foreach(explode(',', $doctor->specialty) as $spec)
                    <span class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs mr-1 mb-1">{{ trim($spec) }}</span>
                  @endforeach
                @endif
              </div>
              <p class="mt-2 text-gray-700 text-sm">{{ $doctor->bio }}</p>
              <p class="mt-2 text-gray-600">📞 {{ $doctor->phone ?? 'Non renseigné' }}</p>
            </div>
          </div>
          @endforeach
        </div>
        <!-- Pagination & navigation -->
        <div class="swiper-pagination mt-4"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
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

  <!-- Carte OpenStreetMap avec Leaflet (localisation hôpitaux et pharmacies) -->
  <section class="py-16 px-6 bg-white" id="map-section">
    <h2 class="text-3xl font-bold mb-8 text-blue-800 text-center">Localisation des hôpitaux et pharmacies proches</h2>
    <div class="flex justify-center">
      <div id="map-main" style="height: 400px; width: 100%; max-width: 900px;"></div>
    </div>
    <p class="mt-4 text-center text-sm text-gray-500">Sources OpenStreetMap et base MediConnectHub.</p>
  </section>

  <!-- Footer -->
  <footer class="bg-blue-900 text-white py-6 text-center">
    <p>&copy; {{ date('Y') }} MediConnectHub. Tous droits réservés.</p>
    <div class="mt-2 text-sm text-blue-200">
      <a href="#" class="hover:underline mx-2">Conditions d'utilisation</a> |
      <a href="#" class="hover:underline mx-2">Politique de confidentialité</a> |
      <a href="#" class="hover:underline mx-2">Contact</a>
    </div>
  </footer>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- Leaflet CSS & JS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <!-- Init AOS & Swiper -->
  <script>
    AOS.init({ duration: 1000, once: true });
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: { el: ".swiper-pagination", clickable: true },
      navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
      breakpoints: {
        640: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 }
      }
    });
  </script>
  <script>
    // Exemple de données (à remplacer par vos données dynamiques)
    var hospitals = [
      { name: 'Hôpital de Cotonou', lat: 6.3703, lng: 2.3912 },
      { name: 'Hôpital St Jean', lat: 6.3720, lng: 2.3900 },
      { name: 'Hôpital Zogbo', lat: 6.3550, lng: 2.4050 }
    ];
    var pharmacies = [
      { name: 'Pharmacie Centrale', lat: 6.3703, lng: 2.3950 },
      { name: 'Pharmacie du Port', lat: 6.3680, lng: 2.3920 },
      { name: 'Pharmacie Zogbo', lat: 6.3555, lng: 2.4060 }
    ];
    // Fonction de calcul de distance (Haversine)
    function getDistance(lat1, lon1, lat2, lon2) {
      function toRad(x) { return x * Math.PI / 180; }
      var R = 6371; // km
      var dLat = toRad(lat2-lat1);
      var dLon = toRad(lon2-lon1);
      var a = Math.sin(dLat/2)*Math.sin(dLat/2) + Math.cos(toRad(lat1))*Math.cos(toRad(lat2))*Math.sin(dLon/2)*Math.sin(dLon/2);
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
      return R * c;
    }
    var mapMain = L.map('map-main').setView([6.3703, 2.3912], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '© OpenStreetMap'
    }).addTo(mapMain);
    // Géolocalisation utilisateur
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var userLat = position.coords.latitude;
        var userLng = position.coords.longitude;
        mapMain.setView([userLat, userLng], 14);
        L.marker([userLat, userLng], {icon: L.icon({iconUrl: 'https://cdn-icons-png.flaticon.com/512/64/64113.png', iconSize: [32,32]})})
          .addTo(mapMain)
          .bindPopup('Vous êtes ici').openPopup();
        // Afficher hôpitaux proches (<= 10km)
        hospitals.forEach(function(h) {
          var dist = getDistance(userLat, userLng, h.lat, h.lng);
          if (dist <= 10) {
            L.marker([h.lat, h.lng], {icon: L.icon({iconUrl: 'https://cdn-icons-png.flaticon.com/512/2967/2967350.png', iconSize: [28,28]})})
              .addTo(mapMain)
              .bindPopup(h.name + ' (Hôpital)<br>Distance : ' + dist.toFixed(2) + ' km');
          }
        });
        // Afficher pharmacies proches (<= 10km)
        pharmacies.forEach(function(p) {
          var dist = getDistance(userLat, userLng, p.lat, p.lng);
          if (dist <= 10) {
            L.marker([p.lat, p.lng], {icon: L.icon({iconUrl: 'https://cdn-icons-png.flaticon.com/512/2972/2972185.png', iconSize: [28,28]})})
              .addTo(mapMain)
              .bindPopup(p.name + ' (Pharmacie)<br>Distance : ' + dist.toFixed(2) + ' km');
          }
        });
      });
    }
  </script>
</body>
</html>