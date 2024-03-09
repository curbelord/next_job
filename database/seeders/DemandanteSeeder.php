<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Demandante;

class DemandanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo para Demandante
        Demandante::create([
            'id' => 1,
            // Otros campos de Demandante si los hay
        ]);

        // Puedes agregar más registros de Demandante si lo deseas
    }
}
