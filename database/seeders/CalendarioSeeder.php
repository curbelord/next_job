<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calendario;

class CalendarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Calendario::create([
            'id' => 1,
            'evento' => 'Reunión de equipo',
            'fecha' => '2024-03-08',
            'hora_inicio' => '09:00',
            'hora_cierre' => '10:00',
            'descripcion' => 'Reunión semanal de equipo para discutir los avances del proyecto.',
            'id_seleccionador' => 2, 
        ]);

        Calendario::create([
            'id' => 2,
            'evento' => 'Entrevista de trabajo',
            'fecha' => '2024-03-10',
            'hora_inicio' => '11:00',
            'hora_cierre' => '12:00',
            'descripcion' => 'Entrevista de trabajo para el puesto de desarrollador web.',
            'id_seleccionador' => 4, 
        ]);

        Calendario::create([
            'id' => 3,
            'evento' => 'Reunión de equipo',
            'fecha' => '2024-03-12',
            'hora_inicio' => '09:00',
            'hora_cierre' => '10:00',
            'descripcion' => 'Reunión semanal de equipo para discutir los avances del proyecto.',
            'id_seleccionador' => 6, 
        ]);

        Calendario::create([
            'id' => 4,
            'evento' => 'Entrevista de trabajo',
            'fecha' => '2024-03-14',
            'hora_inicio' => '11:00',
            'hora_cierre' => '12:00',
            'descripcion' => 'Entrevista de trabajo para el puesto de desarrollador web.',
            'id_seleccionador' => 8, 
        ]);

        Calendario::create([
            'id' => 5,
            'evento' => 'Reunión de equipo',
            'fecha' => '2024-03-16',
            'hora_inicio' => '09:00',
            'hora_cierre' => '10:00',
            'descripcion' => 'Reunión semanal de equipo para discutir los avances del proyecto.',
            'id_seleccionador' => 10, 
        ]);
        
    }
}
