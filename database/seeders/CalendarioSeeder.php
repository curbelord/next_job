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
        // Crear datos de ejemplo para Calendario
        Calendario::create([
            'id' => 1,
            'evento' => 'Reunión de equipo',
            'fecha' => '2024-03-08',
            'hora_inicio' => '09:00',
            'hora_cierre' => '10:00',
            'descripcion' => 'Reunión semanal de equipo para discutir los avances del proyecto.',
            'id_seleccionador' => 2, // Suponiendo que tienes un seleccionador asociado
        ]);

        // Puedes agregar más registros de Calendario si lo deseas
    }
}
