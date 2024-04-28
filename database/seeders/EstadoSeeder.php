<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Estado::create([
            'id' => 1,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 1,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 2,
            'nombre' => 'Seleccionado',
            'descripcion' => 'Candidato seleccionado',
            'id_demandante' => 1,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 3,
            'nombre' => 'Cancelado',
            'descripcion' => 'Cancelado por el demandante',
            'id_demandante' => 3,
            'id_oferta' => 2,
        ]);

        Estado::create([
            'id' => 4,
            'nombre' => 'Seleccionado',
            'descripcion' => 'Candidato seleccionado',
            'id_demandante' => 5,
            'id_oferta' => 3,
        ]);

        Estado::create([
            'id' => 5,
            'nombre' => 'Fallido',
            'descripcion' => 'Falló en la entrevista de trabajo',
            'id_demandante' => 7,
            'id_oferta' => 4,
        ]);

    }
}