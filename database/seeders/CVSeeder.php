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
        CV::create([
            'id' => 1,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 1,
        ]);

        CV::create([
            'id' => 2,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 3,
        ]);

        CV::create([
            'id' => 3,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 5,
        ]);

        CV::create([
            'id' => 4,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 7,
        ]);

        CV::create([
            'id' => 5,
            'jornada_laboral' => 'Tiempo parcial',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 9,
        ]);
        
    }
}
