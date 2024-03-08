<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mensaje;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo para Mensaje
        Mensaje::create([
            'id' => 1,
            'id_emisor' => 2, // Suponiendo que tienes un emisor asociado
            'id_receptor' => 1, // Suponiendo que tienes un receptor asociado
            'mensaje' => 'Hola, ¿cómo estás?',
        ]);

        // Puedes agregar más registros de Mensaje si lo deseas
    }
}
