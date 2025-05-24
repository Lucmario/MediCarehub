<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MediCareHub - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-lg rounded-lg p-10 flex">
        <!-- Form -->
        <div class="w-1/2">
            <h1 class="text-3xl font-bold text-blue-800 mb-6">MediCareHub</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label>Email address</label>
                    <input type="email" name="email" class="w-full border p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label>Password</label>
                    <input type="password" name="password" class="w-full border p-2 rounded" required>
                </div>
                <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded w-full">Sign in</button>
            </form>
            <p class="text-sm text-gray-600 mt-4">Your security is our priority</p>
        </div>

        <!-- Roles -->
        <div class="w-1/2 pl-10 space-y-3">
            <button class="bg-blue-500 w-full text-white p-2 rounded">Administrator</button>
            <button class="bg-teal-500 w-full text-white p-2 rounded">Patient</button>
            <button class="bg-green-500 w-full text-white p-2 rounded">Doctor</button>
            <button class="bg-purple-500 w-full text-white p-2 rounded">Pharmacist</button>
            <button class="bg-pink-500 w-full text-white p-2 rounded">Cashier</button>
        </div>
    </div>

    <div class="fixed bottom-0 w-full bg-red-500 text-white text-center py-2">
        ⚠️ Health advisory update
    </div>
</body>
</html>
