<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CV;

class CVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo para CV
        CV::create([
            'id' => 1,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 1, // Suponiendo que tienes un demandante asociado
        ]);

        // Puedes agregar más registros de CV si lo deseas
    }
}
