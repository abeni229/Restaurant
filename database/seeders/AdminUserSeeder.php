<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@saveursdubenin.bj'],
            [
                'name' => 'Administrateur',
                'password' => bcrypt('admin123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
