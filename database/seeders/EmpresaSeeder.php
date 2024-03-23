<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'id' => 1,
            'nombre' => 'Artek',
            'descripcion' => 'Empresa de desarrollo de software',
            'ubicacion' => 'Arrecife',
        ]);

        Empresa::create([
            'id' => 2,
            'nombre' => 'Biosfera',
            'descripcion' => 'Empresa de desarrollo de videojuegos',
            'ubicacion' => 'Teguise',
        ]);

        Empresa::create([
            'id' => 3,
            'nombre' => 'Cactus',
            'descripcion' => 'Vivero de plantas',
            'ubicacion' => 'Yaiza',
        ]);

        Empresa::create([
            'id' => 4,
            'nombre' => 'Dunas',
            'descripcion' => 'Empresa de desarrollo de páginas web',
            'ubicacion' => 'Tías',
        ]);

        Empresa::create([
            'id' => 5,
            'nombre' => 'Estrella',
            'descripcion' => 'Restaurante de comida rápida',
            'ubicacion' => 'Tinajo',
        ]);
    }
}
