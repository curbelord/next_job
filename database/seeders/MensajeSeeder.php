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
        Mensaje::create([
            'id' => 1,
            'id_emisor' => 2, 
            'id_receptor' => 1, 
            'mensaje' => 'Hola, ¿cómo estás?',
        ]);

    }
}
