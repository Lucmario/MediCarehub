<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Pharmacist;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // Affiche la page de sélection de rôle
    public function selectRole() {
        return view('auth.select-role');
    }

    // Affiche le formulaire d'inscription selon le rôle
    public function showRegisterForm($role) {
        // Vérifie que le rôle est valide
        if (!in_array($role, ['patient', 'doctor', 'pharmacist'])) {
            abort(404);
        }
        return view("auth.register_$role", compact('role'));
    }

    // Traite l'inscription selon le rôle
    public function register(Request $request, $role) {
        if (!in_array($role, ['patient', 'doctor', 'pharmacist'])) {
            abort(404);
        }

        // Validation de base pour tous les rôles
        $baseValidation = [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ];

        // Validation spécifique selon le rôle
        $roleValidation = [];
        switch ($role) {
            case 'doctor':
                $roleValidation = [
                    'specialty' => 'required|string|max:255',
                    'phone' => 'required|string|max:20',
                    'bio' => 'nullable|string|max:1000',
                ];
                break;
            case 'pharmacist':
                $roleValidation = [
                    'pharmacy_number' => 'required|string|max:50',
                    'phone' => 'required|string|max:20',
                ];
                break;
            case 'patient':
                $roleValidation = [
                    'phone' => 'required|string|max:20',
                    'birth_date' => 'required|date',
                    'gender' => 'required|in:male,female,other',
                ];
                break;
        }

        // Fusion des validations
        $validated = $request->validate(array_merge($baseValidation, $roleValidation));

        // Récupérer l'ID du rôle
        $roleModel = Role::where('name', $role)->first();
        if (!$roleModel) {
            $roleModel = Role::create(['name' => $role]);
        }

        try {
            // Création de l'utilisateur
            $user = User::create([
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role_id' => $roleModel->id,
            ]);

            // Création de l'entité métier associée avec les données spécifiques
            switch ($role) {
                case 'patient':
                    Patient::create([
                        'user_id' => $user->id,
                        'phone' => $validated['phone'],
                        'birth_date' => $validated['birth_date'],
                        'gender' => $validated['gender'],
                    ]);
                    break;
                case 'doctor':
                    Doctor::create([
                        'user_id' => $user->id,
                        'specialty' => $validated['specialty'],
                        'phone' => $validated['phone'],
                        'bio' => $validated['bio'] ?? null,
                    ]);
                    break;
                case 'pharmacist':
                    Pharmacist::create([
                        'user_id' => $user->id,
                        'pharmacy_number' => $validated['pharmacy_number'],
                        'phone' => $validated['phone'],
                    ]);
                    break;
            }

            // Connexion automatique
            Auth::login($user);

            // Message de succès personnalisé selon le rôle
            $successMessage = match($role) {
                'patient' => 'Bienvenue sur MediCareHub ! Votre compte patient a été créé avec succès.',
                'doctor' => 'Bienvenue sur MediCareHub ! Votre compte médecin a été créé avec succès.',
                'pharmacist' => 'Bienvenue sur MediCareHub ! Votre compte pharmacien a été créé avec succès.',
                default => 'Bienvenue sur MediCareHub ! Votre compte a été créé avec succès.'
            };

            return redirect()->route('dashboard')->with('success', $successMessage);
        } catch (\Exception $e) {
            // Message d'erreur plus détaillé
            $errorMessage = 'Une erreur est survenue lors de l\'inscription : ' . $e->getMessage();
            return back()
                ->withInput()
                ->withErrors(['error' => $errorMessage]);
        }
    }

    // Formulaire de connexion
    public function showLoginForm() {
        return view('auth.login');
    }

    // Traitement de la connexion
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors(['email' => 'Identifiants invalides.']);
    }

    // Formulaire de modification de profil
    public function editProfile() {
        $user = Auth::user();
        return view('auth.edit-profile', compact('user'));
    }

    // Traitement de la modification de profil
    public function updateProfile(Request $request) {
        $user = Auth::user();
        // Valide et met à jour les champs selon le rôle
        // ...
        return back()->with('success', 'Profil mis à jour.');
    }

    // Redirige vers Google pour l'authentification
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        // Recherche ou création de l'utilisateur
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'firstname' => $googleUser->user['given_name'] ?? $googleUser->getName(),
                'lastname' => $googleUser->user['family_name'] ?? '',
                'password' => bcrypt(uniqid()),
                'role_id' => Role::where('name', 'patient')->first()->id, // Par défaut, ou à adapter selon logique
            ]
        );
        // Crée l'entité Patient si nouvel utilisateur
        if ($user->wasRecentlyCreated && !Patient::where('user_id', $user->id)->exists()) {
            Patient::create(['user_id' => $user->id]);
        }
        Auth::login($user, true);
        return redirect()->route('dashboard');
    }
}