<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder de Administrador
        User::create([
            'username' => Crypt::encryptString('admin'),
            'nombre' => Crypt::encryptString('Administrador'),
            'apellido_paterno' => Crypt::encryptString('Sistema'),
            'apellido_materno' => Crypt::encryptString('Admin'),
            'telefono' => Crypt::encryptString('1234567890'),
            'fecha_nacimiento' => Crypt::encryptString('1990-01-01'),
            'email' => 'admin@email.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('administrador');


        // Seeder de Organizador
        User::create([
            'username' => Crypt::encryptString('organizador'),
            'nombre' => Crypt::encryptString('Organizador'),
            'apellido_paterno' => Crypt::encryptString('Sistema'),
            'apellido_materno' => Crypt::encryptString('Organizador'),
            'telefono' => Crypt::encryptString('1234567890'),
            'fecha_nacimiento' => Crypt::encryptString('1990-01-01'),
            'email' => 'organizador@email.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('organizador');

        // Seeder de Aficionado
        
    }
}
