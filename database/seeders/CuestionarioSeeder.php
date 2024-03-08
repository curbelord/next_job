<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuestionario;

class CuestionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo para Cuestionario
        Cuestionario::create([
            'id' => 1,
            'fecha' => '2024-03-08',
            'tipo' => 'Encuesta de satisfacción',
        ]);

        // Puedes agregar más registros de Cuestionario si lo deseas
    }
}
