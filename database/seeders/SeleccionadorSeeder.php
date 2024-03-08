<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seleccionador;

class SeleccionadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo para Seleccionador
        Seleccionador::create([
            'id' => 2,
            'id_empresa' => 1, // Asignar el ID de la empresa correspondiente
            // Otros campos de Seleccionador si los hay
        ]);

        // Puedes agregar más registros de Seleccionador si lo deseas
    }
}
