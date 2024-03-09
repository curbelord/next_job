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
        // Crear datos de prueba para la tabla cuestionarios
        Cuestionario::create([
            'fecha' => Carbon::now(),
            'tipo' => 'Prueba técnica',
            'id_seleccionador' => 2,
            'id_demandante' => 1,
            'id_oferta' => 1,
        ]);

        // Puedes agregar más datos de prueba según sea necesario
    }
}
