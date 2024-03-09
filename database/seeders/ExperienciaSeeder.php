<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experiencia;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo para Experiencia
        Experiencia::create([
            'id_cv' => 1,
            'id_experiencia' => 1,
            'nombre' => 'Desarrollador web',
            'centro_laboral' => 'Empresa XYZ',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        // Puedes agregar más registros de Experiencia si lo deseas
    }
}
