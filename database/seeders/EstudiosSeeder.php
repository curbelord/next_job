<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estudios;

class EstudiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo para Estudios
        Estudios::create([
            'id_cv' => 1,
            'id_estudio' => 1,
            'nombre' => 'Ingeniería Informática',
            'centro_estudios' => 'Universidad XYZ',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2019-06-30',
        ]);

        // Puedes agregar más registros de Estudios si lo deseas
    }
}
