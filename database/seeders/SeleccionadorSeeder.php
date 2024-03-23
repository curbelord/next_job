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
        Seleccionador::create([
            'id' => 2,
            'id_empresa' => 1,
        ]);

        Seleccionador::create([
            'id' => 4,
            'id_empresa' => 2,
        ]);

        Seleccionador::create([
            'id' => 6,
            'id_empresa' => 3,
        ]);

        Seleccionador::create([
            'id' => 8,
            'id_empresa' => 4,
        ]);

        Seleccionador::create([
            'id' => 10,
            'id_empresa' => 5,
        ]);
    }
}
