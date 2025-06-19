<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PharmacistController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

// Accueil (page d'accueil nommée 'home')
Route::get('/', function () {
    $doctors = Doctor::with('user')->get();
    return view('welcome', compact('doctors'));
})->name('home');

// Dashboard Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Dashboard général
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Routes ressources pour chaque entité
Route::middleware('auth')->group(function () {
    Route::resource('patients', PatientController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('medical-records', MedicalRecordController::class);
    Route::resource('consultations', ConsultationController::class);
    Route::resource('prescriptions', PrescriptionController::class);
    Route::resource('bills', BillController::class);
    Route::resource('pharmacists', PharmacistController::class);
    Route::resource('cashiers', CashierController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

// ------------------- AUTHENTIFICATION MULTI-ROLES -------------------
// Sélection du rôle
Route::get('/select-role', [AuthController::class, 'selectRole'])->name('select.role');

// Inscription par rôle
Route::get('/register/{role}', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register/{role}', [AuthController::class, 'register'])->name('register');

// Connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});

// Auth Google
Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
// --------------------------------------------------------------------

// Autres pages statiques
Route::view('/a-propos', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// Route de déconnexion (logout)
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');