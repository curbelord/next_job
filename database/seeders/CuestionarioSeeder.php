<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuestionario;
use Carbon\Carbon;

class CuestionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Cuestionario::create([
            'fecha' => Carbon::now(),
            'tipo' => 'Prueba técnica',
            'id_seleccionador' => 2,
            'id_demandante' => 1,
            'id_oferta' => 1,
        ]);

        Cuestionario::create([
            'fecha' => Carbon::now(),
            'tipo' => 'Prueba técnica',
            'id_seleccionador' => 4,
            'id_demandante' => 3,
            'id_oferta' => 2,
        ]);
    }
}
