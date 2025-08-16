<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario administrador por defecto
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@tp5.test',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        // Crear algunos usuarios de prueba
        User::factory()->count(3)->create();
    }
}
