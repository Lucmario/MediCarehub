<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class FixAdminUserSeeder extends Seeder
{
    public function run()
    {
        $role = Role::firstOrCreate(['name' => 'admin']);
        User::updateOrCreate(
            ['email' => 'lucmariolokossou@gmail.com'],
            [
                'name' => 'Krishna Lokossou',
                'firstname' => 'Krishna',
                'lastname' => 'Lokossou',
                'password' => bcrypt('motdepasseadmin'),
                'role_id' => $role->id
            ]
        );
    }
} 