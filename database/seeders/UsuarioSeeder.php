<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar datos de ejemplo
        Usuario::create([
            'id' => 1,
            'nombre' => 'Juan',
            'apellidos' => 'Perez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1990-05-15',
            'direccion' => 'Calle Principal 123',
            'correo' => 'juan@example.com',
            'telefono' => '+123456789',
        ]);

        Usuario::create([
            'id' => 2,
            'nombre' => 'Maria',
            'apellidos' => 'Gonzalez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1995-08-25',
            'direccion' => 'Avenida Central 456',
            'correo' => 'maria@example.com',
            'telefono' => '+987654321',
        ]);

        Usuario::create([
            'id' => 3,
            'nombre' => 'Carlos',
            'apellidos' => 'Rodriguez',
            'genero' => 'Otro',
            'fecha_nacimiento' => '1988-12-10',
            'direccion' => 'Plaza Mayor 789',
            'correo' => 'carlos@example.com',
            'telefono' => '+111222333',
        ]);
    }
}
