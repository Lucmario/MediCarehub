<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function selectRole()
    {
        $roles = Role::all();
        return view('auth.select-role', compact('roles'));
    }

    public function showRegisterForm($role)
    {
        return view('auth.register', compact('role'));
    }

    public function register(Request $request, $role)
    {
        // Logique d'inscription selon le rôle
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role && $user->role->name === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role && $user->role->name === 'doctor') {
                return redirect()->route('doctor.dashboard');
            } elseif ($user->role && $user->role->name === 'pharmacist') {
                return redirect()->route('pharmacist.dashboard');
            } else {
                return redirect()->route('patient.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Identifiants invalides.',
        ]);
    }

    public function editProfile()
    {
        // Logique d'édition de profil
    }

    public function updateProfile(Request $request)
    {
        // Logique de mise à jour de profil
    }

    public function redirectToGoogle()
    {
        // Logique de redirection Google OAuth
    }

    public function handleGoogleCallback()
    {
        // Logique de callback Google OAuth
    }
} 