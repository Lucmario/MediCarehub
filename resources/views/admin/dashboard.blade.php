<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediConnectHub - Plateforme Médicale Intelligente</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7fafc;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        }
        
        .medical-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .medical-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: #ef4444;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
        
        .sidebar-item {
            transition: all 0.2s ease;
        }
        
        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid white;
        }
        
        .active-tab {
            border-bottom: 3px solid #3b82f6;
            color: #3b82f6;
            font-weight: 500;
        }
        
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="gradient-bg text-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-heartbeat text-3xl"></i>
                <h1 class="text-2xl font-bold">MediConnectHub</h1>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="p-2 rounded-full hover:bg-blue-700 transition">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="notification-badge">3</span>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    @auth
                        @php
                            $user = Auth::user();
                            $avatarUrl = $user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->firstname . ' ' . $user->lastname) . '&background=0d6efd&color=fff';
                            $hour = now()->format('H');
                            if ($hour < 12) {
                                $greeting = 'Bonjour';
                            } elseif ($hour < 18) {
                                $greeting = 'Bon après-midi';
                            } else {
                                $greeting = 'Bonsoir';
                            }
                            $roleLabel = '';
                            if ($user->role && $user->role->name === 'doctor') {
                                $roleLabel = 'Dr. ';
                            } elseif ($user->role && $user->role->name === 'pharmacist') {
                                $roleLabel = 'Pharmacien ';
                            } elseif ($user->role && $user->role->name === 'patient') {
                                $roleLabel = '';
                            }
                        @endphp
                    @endauth
                    @auth
                        <img src="{{ $avatarUrl }}" class="w-10 h-10 rounded-full" alt="Avatar">
                        <span class="font-medium">{{ $user->firstname }} {{ $user->lastname }}</span>
                    @else
                        <span class="font-medium">Invité</span>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-6 flex flex-col lg:flex-row gap-6">
        <!-- Sidebar -->
        <aside class="w-full lg:w-64 bg-white rounded-lg shadow-md p-4 h-fit">
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg bg-blue-50 text-blue-600">
                            <i class="fas fa-home text-lg"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.appointments') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-calendar-check text-lg"></i>
                            <span>Gérer les rendez-vous</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('medical-records.index') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-file-medical text-lg"></i>
                            <span>Dossier médical</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-prescription-bottle-alt text-lg"></i>
                            <span>Ordonnances</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-pills text-lg"></i>
                            <span>Pharmacie</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-cog text-lg"></i>
                            <span>Paramètres</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-users text-lg"></i>
                            <span>Gérer les utilisateurs</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                <h3 class="font-medium text-blue-800 mb-2">Besoin d'aide ?</h3>
                <p class="text-sm text-gray-600 mb-3">Notre équipe est disponible 24/7 pour vous assister.</p>
                <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition flex items-center justify-center space-x-2">
                    <i class="fas fa-headset"></i>
                    <span>Contactez-nous</span>
                </button>
            </div>
        </aside>

        <!-- Main Panel -->
        <main class="flex-1">
            <!-- Welcome Banner -->
            <div class="gradient-bg text-white rounded-xl p-6 mb-6 shadow-lg">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="flex items-center space-x-4">
                        @auth
                            <img src="{{ $avatarUrl }}" class="w-14 h-14 rounded-full border-2 border-white" alt="Avatar">
                        @endauth
                        <div>
                            <h2 class="text-2xl font-bold mb-2">
                                @auth
                                    {{ $greeting }}, {{ $roleLabel }}{{ $user->firstname }} {{ $user->lastname }}
                                @else
                                    Bienvenue, Invité
                                @endauth
                            </h2>
                            <p class="opacity-90">Bienvenue sur votre espace personnel MediConnectHub</p>
                        </div>
                    </div>
                    <button id="arrivalBtn" class="mt-4 md:mt-0 bg-white text-blue-600 font-semibold py-2 px-6 rounded-lg hover:bg-gray-100 transition flex items-center space-x-2">
                        <i class="fas fa-check-circle"></i>
                        <span>Je suis arrivé(e)</span>
                    </button>
                </div>
            </div>
            
            <!-- Tabs Navigation -->
            <div class="bg-white rounded-lg shadow mb-6">
                <div class="border-b border-gray-200">
                    <nav class="flex overflow-x-auto custom-scrollbar">
                        <button class="tab-btn px-6 py-4 text-sm font-medium active-tab">
                            Tableau de bord
                        </button>
                        <button class="tab-btn px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                            Mes rendez-vous
                        </button>
                        <button class="tab-btn px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                            Dossier médical
                        </button>
                        <button class="tab-btn px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                            Pharmacie
                        </button>
                    </nav>
                </div>
            </div>
            
            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <!-- Next Appointment Card -->
                <div class="medical-card bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-lg text-gray-800">Prochain rendez-vous</h3>
                        <div class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            Confirmé
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-user-md text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Dr. Jean Martin</h4>
                            <p class="text-sm text-gray-500">Cardiologue</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between text-sm">
                            <div>
                                <p class="text-gray-500">Date</p>
                                <p class="font-medium">15 Juin 2023</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Heure</p>
                                <p class="font-medium">14:30 - 15:00</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Lieu</p>
                                <p class="font-medium">Cabinet A</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                        <button class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition text-sm">
                            Voir détails
                        </button>
                        <button class="flex-1 border border-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-50 transition text-sm">
                            Annuler
                        </button>
                    </div>
                </div>
                
                <!-- Medical File Card -->
                <div class="medical-card bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-lg text-gray-800">Dossiers médicaux</h3>
                        <div class="text-blue-600">
                            <i class="fas fa-file-medical"></i>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <p class="text-sm font-medium">Total des dossiers enregistrés :</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $medicalRecords->count() }}</p>
                    </div>
                    <a href="{{ route('medical-records.index') }}" class="w-full mt-6 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition flex items-center justify-center space-x-2 text-sm">
                        <i class="fas fa-eye"></i>
                        <span>Gérer les dossiers médicaux</span>
                    </a>
                </div>
                
                <!-- Pharmacy Order Card -->
                <div class="medical-card bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-lg text-gray-800">Commande en pharmacie</h3>
                        <div class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            Prête
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-prescription-bottle-alt text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Pharmacie MediCare</h4>
                            <p class="text-sm text-gray-500">2 médicaments</p>
                        </div>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-lg mb-4">
                        <p class="text-sm text-blue-800">Votre ordonnance du 10/06/2023 est prête à être retirée.</p>
                    </div>
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition text-sm">
                            Payer en ligne
                        </button>
                        <button class="flex-1 border border-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-50 transition text-sm">
                            Retirer sur place
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Upcoming Appointments -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="font-semibold text-lg text-gray-800">Rendez-vous à venir</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    <!-- Appointment 1 -->
                    <div class="p-6 hover:bg-gray-50 transition">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex items-start space-x-4">
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <i class="fas fa-user-md text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Dr. Sophie Lambert</h4>
                                    <p class="text-sm text-gray-500">Dermatologue</p>
                                    <div class="mt-2 flex flex-wrap gap-2">
                                        <span class="bg-gray-100 text-gray-800 text-xs px-2.5 py-0.5 rounded-full">Consultation</span>
                                        <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded-full">Cabinet B</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0 flex flex-col items-end">
                                <p class="font-medium">20 Juin 2023</p>
                                <p class="text-sm text-gray-500">09:00 - 09:30</p>
                                <button class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    <span>Ajouter au calendrier</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Appointment 2 -->
                    <div class="p-6 hover:bg-gray-50 transition">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex items-start space-x-4">
                                <div class="bg-purple-100 p-3 rounded-full">
                                    <i class="fas fa-user-md text-purple-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Dr. Pierre Lefèvre</h4>
                                    <p class="text-sm text-gray-500">Ophtalmologue</p>
                                    <div class="mt-2 flex flex-wrap gap-2">
                                        <span class="bg-gray-100 text-gray-800 text-xs px-2.5 py-0.5 rounded-full">Contrôle annuel</span>
                                        <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded-full">Cabinet C</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0 flex flex-col items-end">
                                <p class="font-medium">5 Juillet 2023</p>
                                <p class="text-sm text-gray-500">11:15 - 11:45</p>
                                <button class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    <span>Ajouter au calendrier</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 text-center">
                    <button class="text-blue-600 hover:text-blue-800 font-medium flex items-center justify-center w-full">
                        <i class="fas fa-plus mr-2"></i>
                        <span>Prendre un nouveau rendez-vous</span>
                    </button>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <a href="{{ route('admin.appointments') }}" class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition flex flex-col items-center">
                    <div class="bg-blue-100 p-3 rounded-full mb-2">
                        <i class="fas fa-calendar-plus text-blue-600 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-center">Gérer les rendez-vous</span>
                </a>
                <button class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition flex flex-col items-center">
                    <div class="bg-green-100 p-3 rounded-full mb-2">
                        <i class="fas fa-file-medical text-green-600 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-center">Dossier médical</span>
                </button>
                <button class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition flex flex-col items-center">
                    <div class="bg-purple-100 p-3 rounded-full mb-2">
                        <i class="fas fa-pills text-purple-600 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-center">Pharmacie</span>
                </button>
                <button class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition flex flex-col items-center">
                    <div class="bg-orange-100 p-3 rounded-full mb-2">
                        <i class="fas fa-question-circle text-orange-600 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-center">Aide</span>
                </button>
            </div>

            @auth
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @if($user->role && $user->role->name === 'admin')
                        <a href="{{ route('users.index') }}" class="bg-blue-600 text-white p-6 rounded-lg shadow hover:bg-blue-700 flex flex-col items-center">
                            <i class="fas fa-users text-3xl mb-2"></i>
                            <span class="font-semibold">Gérer les utilisateurs</span>
                        </a>
                    @endif
                    @if($user->role && $user->role->name === 'doctor')
                        <a href="{{ route('consultations.index') }}" class="bg-teal-600 text-white p-6 rounded-lg shadow hover:bg-teal-700 flex flex-col items-center">
                            <i class="fas fa-stethoscope text-3xl mb-2"></i>
                            <span class="font-semibold">Mes consultations</span>
                        </a>
                    @endif
                    @if($user->role && $user->role->name === 'patient')
                        <a href="{{ route('medical-records.index') }}" class="bg-green-600 text-white p-6 rounded-lg shadow hover:bg-green-700 flex flex-col items-center">
                            <i class="fas fa-file-medical text-3xl mb-2"></i>
                            <span class="font-semibold">Mon dossier médical</span>
                        </a>
                    @endif
                    @if($user->role && $user->role->name === 'pharmacist')
                        <a href="#" class="bg-yellow-500 text-white p-6 rounded-lg shadow hover:bg-yellow-600 flex flex-col items-center">
                            <i class="fas fa-capsules text-3xl mb-2"></i>
                            <span class="font-semibold">Ordonnances à valider</span>
                        </a>
                    @endif
                </div>
            @endauth
        </main>
    </div>
    
    <!-- Modal (hidden by default) -->
    <div id="arrivalModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-4">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Confirmation d'arrivée</h3>
                    <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <p class="text-gray-600 mb-6">Vous confirmez votre arrivée pour votre rendez-vous avec le Dr. Jean Martin aujourd'hui à 14:30 ?</p>
                <div class="flex space-x-3">
                    <button id="confirmArrival" class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                        Confirmer
                    </button>
                    <button id="cancelArrival" class="flex-1 border border-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-100 transition">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Notification Toast (hidden by default) -->
    <div id="successToast" class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-3 transform translate-y-10 opacity-0 transition-all duration-300 z-50">
        <i class="fas fa-check-circle text-xl"></i>
        <div>
            <p class="font-medium">Confirmation enregistrée</p>
            <p class="text-sm opacity-90">Vous avez été ajouté(e) à la file d'attente</p>
        </div>
    </div>

    <script>
        // DOM Elements
        const arrivalBtn = document.getElementById('arrivalBtn');
        const arrivalModal = document.getElementById('arrivalModal');
        const closeModal = document.getElementById('closeModal');
        const confirmArrival = document.getElementById('confirmArrival');
        const cancelArrival = document.getElementById('cancelArrival');
        const successToast = document.getElementById('successToast');
        const tabButtons = document.querySelectorAll('.tab-btn');
        
        // Event Listeners
        arrivalBtn.addEventListener('click', () => {
            arrivalModal.classList.remove('hidden');
        });
        
        closeModal.addEventListener('click', () => {
            arrivalModal.classList.add('hidden');
        });
        
        cancelArrival.addEventListener('click', () => {
            arrivalModal.classList.add('hidden');
        });
        
        confirmArrival.addEventListener('click', () => {
            arrivalModal.classList.add('hidden');
            showSuccessToast();
        });
        
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                tabButtons.forEach(btn => {
                    btn.classList.remove('active-tab');
                    btn.classList.add('text-gray-500', 'hover:text-gray-700');
                });
                
                // Add active class to clicked button
                button.classList.add('active-tab');
                button.classList.remove('text-gray-500', 'hover:text-gray-700');
            });
        });
        
        // Functions
        function showSuccessToast() {
            successToast.classList.remove('translate-y-10', 'opacity-0');
            successToast.classList.add('translate-y-0', 'opacity-100');
            
            setTimeout(() => {
                successToast.classList.remove('translate-y-0', 'opacity-100');
                successToast.classList.add('translate-y-10', 'opacity-0');
            }, 3000);
        }
        
        // Simulate loading data
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                // This would be replaced with actual data loading in a real app
                console.log('Page loaded');
            }, 500);
        });
    </script>
</body>
</html>



