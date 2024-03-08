<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inscripcion;

class InscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo para Inscripcion
        Inscripcion::create([
            'id_demandante' => 1,
            'id_oferta' => 1,
            'anotacion' => 'Interesado en la oferta',
            'cuestionario' => 1, // Suponiendo que tienes un cuestionario asociado
        ]);

        // Puedes agregar más registros de Inscripcion si lo deseas
    }
}
