<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Fernando',
            'email' => 'fernando@gmail.com',
            'password' => bcrypt('admin123'),
            'admin' => true,
            'apellidos' => 'Rodriguez Tejedor',
            'departamento' => 'Contabilidad',
            'categoria' => 'Director'
        ]);
    }
}
