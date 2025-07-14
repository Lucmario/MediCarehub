<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Pharmacist;

class FixUserRelationsSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            if ($user->role && is_object($user->role)) {
                $roleName = $user->role->name;
            } elseif ($user->role_id) {
                $roleName = optional($user->role)->name;
            } else {
                $roleName = null;
            }
            if ($roleName === 'patient' && !$user->patient) {
                Patient::firstOrCreate([
                    'user_id' => $user->id
                ], [
                    'firstname' => $user->firstname ?? 'Patient',
                    'lastname' => $user->lastname ?? 'Inconnu',
                    'email' => $user->email,
                ]);
            }
            if ($roleName === 'doctor' && !$user->doctor) {
                Doctor::firstOrCreate([
                    'user_id' => $user->id
                ], [
                    'specialty' => 'Généraliste',
                    'phone' => $user->phone ?? '',
                    'bio' => '',
                ]);
            }
            if ($roleName === 'pharmacist' && !$user->pharmacist) {
                Pharmacist::firstOrCreate([
                    'user_id' => $user->id
                ]);
            }
        }
    }
} 