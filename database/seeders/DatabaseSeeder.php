<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criação Única do Super Admin Bloqueado
        if (User::where('email', 'admin@exemplo.com')->doesntExist()) {
            User::create([
                'name' => 'Senhor Administrador',
                'email' => 'admin@exemplo.com',
                'password' => Hash::make('admin123'), // Troque essa senha em produção e no .env!
            ]);
        }
    }
}
