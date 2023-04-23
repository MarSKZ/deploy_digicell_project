<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Medida;
use App\Models\Categoria;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'nombre' => 'Marce Santiago',
            'email' => 'm.santiagof@upam.edu.mx',
            'username' => 'Marce',
            'password' => Hash::make('marce123.')
        ]);

        $marca = Marca::create([
            'nombre' => 'Genérico',
        ]);

        $modelo = Modelo::create([
            'nombre' => 'Genérico',
        ]);

        $medida = Medida::create([
            'codigo' => 'UND',
            'nombre' => 'Unidad',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'Otros',
        ]);
        
    }
}
