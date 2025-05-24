<?php

use Illuminate\Support\Facades\Route;

// Contrôleur du dashboard administrateur
use App\Http\Controllers\Admin\DashboardController;

// Ajoute ces lignes pour les autres contrôleurs :
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

// Accueil
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Page de connexion
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Sélection de rôle
Route::get('/select-role', function () {
    return view('auth.select-role');
})->name('select.role');

// Routes ressources pour chaque entité
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

// Dashboard général
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::view('/', 'welcome')->name('home');
Route::view('/a-propos', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');

Route::get('/doctors/create', [DoctorController::class, 'createWithUser'])->name('doctors.createWithUser');
Route::post('/doctors', [DoctorController::class, 'storeWithUser'])->name('doctors.storeWithUser');


Route::resource('doctors', DoctorController::class);




