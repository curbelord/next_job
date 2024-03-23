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
        Demandante::create([
            'id' => 1,
        ]);

        Demandante::create([
            'id' => 3,
        ]);

        Demandante::create([
            'id' => 5,
        ]);

        Demandante::create([
            'id' => 7,
        ]);

        Demandante::create([
            'id' => 9,
        ]);
    }
}
