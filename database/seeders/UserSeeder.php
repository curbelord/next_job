<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'id' => 1,
            'nombre' => 'Juan',
            'apellidos' => 'Perez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1990-05-15',
            'direccion' => 'Calle Mayor 123',
            'telefono' => '+123456789',
            'email' => 'juan@gmail.com',
            //'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 2,
            'nombre' => 'Maria',
            'apellidos' => 'Gonzalez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1995-08-25',
            'direccion' => 'Avenida Central 456',
            'email' => 'maria@gmail.com',
            'telefono' => '+987654321',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 3,
            'nombre' => 'Carlos',
            'apellidos' => 'Rodriguez',
            'genero' => 'Otro',
            'fecha_nacimiento' => '1988-12-10',
            'direccion' => 'Plaza Mayor 789',
            'email' => 'carlos@gmail.com',
            'telefono' => '+111222333',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 4,
            'nombre' => 'Ana',
            'apellidos' => 'Lopez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1992-03-20',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'ana@gmail.com',
            'telefono' => '+444555666',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 5,
            'nombre' => 'Pedro',
            'apellidos' => 'Martinez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1993-07-30',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'pedro@gmail.com',  
            'telefono' => '+777888999',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 6,
            'nombre' => 'Laura',
            'apellidos' => 'Sanchez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1994-09-05',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'laura@gmail.com',
            'telefono' => '+000111222',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 7,
            'nombre' => 'Sara',
            'apellidos' => 'Garcia',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1996-11-15',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'sara@gmail.com',
            'telefono' => '+333444555',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 8,
            'nombre' => 'Javier',
            'apellidos' => 'Fernandez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1997-01-25',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'javier@gmail.com',
            'telefono' => '+666777888',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 9,
            'nombre' => 'Carmen',
            'apellidos' => 'Jimenez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1998-04-05',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'carmen@gmail.com',
            'telefono' => '+999000111',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 10,
            'nombre' => 'Antonio',
            'apellidos' => 'Ruiz',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1999-06-15',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'antonio@gmail.com',
            'telefono' => '+222333444',
            'password' => bcrypt('password'),
        ]);
    }
}
