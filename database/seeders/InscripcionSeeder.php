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
        Inscripcion::create([
            'id_demandante' => 1,
            'id_oferta' => 1,
            'anotacion' => 'Interesado en la oferta',
        ]);

        Inscripcion::create([
            'id_demandante' => 3,
            'id_oferta' => 2,
            'anotacion' => 'Cancelado por el demandante',
        ]);

        Inscripcion::create([
            'id_demandante' => 5,
            'id_oferta' => 3,
            'anotacion' => 'Candidato seleccionado',
        ]);

        Inscripcion::create([
            'id_demandante' => 7,
            'id_oferta' => 4,
            'anotacion' => 'Falló en la entrevista de trabajo',
        ]);

        Inscripcion::create([
            'id_demandante' => 9,
            'id_oferta' => 5,
            'anotacion' => 'Fuera de plazo de inscripción',
        ]);

        Inscripcion::create([
            'id_demandante' => 1,
            'id_oferta' => 6,
            'anotacion' => 'Pendiente de revisión',
        ]);

        Inscripcion::create([
            'id_demandante' => 3,
            'id_oferta' => 7,
            'anotacion' => 'Rechazado por el seleccionador',
        ]);

    }
}
