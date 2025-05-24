<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | MediCareHub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-xl shadow-lg w-full max-w-4xl flex overflow-hidden">
        <!-- Login Form Section -->
        <div class="w-1/2 p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Login</h2>

            @if(session('error'))
                <div class="bg-red-100 text-red-600 px-4 py-2 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1 text-sm text-gray-600">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-6">
                    <label class="block mb-1 text-sm text-gray-600">Password</label>
                    <input type="password" name="password" required
                           class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition duration-200">
                    Connexion
                </button>
            </form>
        </div>

        <!-- Role Selection Section -->
        <div class="w-1/2 bg-blue-900 text-white p-8 flex flex-col justify-center">
            <h3 class="text-2xl font-semibold mb-4">Choisissez votre rôle</h3>
            <div class="space-y-3">
                <a href="#" class="block px-4 py-2 bg-white text-blue-900 rounded text-center hover:bg-blue-100">Administrateur</a>
                <a href="#" class="block px-4 py-2 bg-white text-blue-900 rounded text-center hover:bg-blue-100">Médecin</a>
                <a href="#" class="block px-4 py-2 bg-white text-blue-900 rounded text-center hover:bg-blue-100">Patient</a>
                <a href="#" class="block px-4 py-2 bg-white text-blue-900 rounded text-center hover:bg-blue-100">Pharmacien</a>
                <a href="#" class="block px-4 py-2 bg-white text-blue-900 rounded text-center hover:bg-blue-100">Caissier</a>
            </div>
        </div>
    </div>

</body>
</html>
