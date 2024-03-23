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
        Estudios::create([
            'id_cv' => 1,
            'id_estudio' => 1,
            'nombre' => 'Ingeniería Informática',
            'centro_estudios' => 'Universidad XYZ',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2019-06-30',
        ]);

        Estudios::create([
            'id_cv' => 2,
            'id_estudio' => 1,
            'nombre' => 'Ingeniería Informática',
            'centro_estudios' => 'Universidad XYZ',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2019-06-30',
        ]);

        Estudios::create([
            'id_cv' => 3,
            'id_estudio' => 1,
            'nombre' => 'Ingeniería Informática',
            'centro_estudios' => 'Universidad XYZ',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2019-06-30',
        ]);

        Estudios::create([
            'id_cv' => 4,
            'id_estudio' => 1,
            'nombre' => 'Ingeniería Informática',
            'centro_estudios' => 'Universidad XYZ',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2019-06-30',
        ]);

        Estudios::create([
            'id_cv' => 5,
            'id_estudio' => 1,
            'nombre' => 'Ingeniería Informática',
            'centro_estudios' => 'Universidad XYZ',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2019-06-30',
        ]);
    }
}
