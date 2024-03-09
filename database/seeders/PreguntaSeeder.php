<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pregunta;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo para Pregunta
        Pregunta::create([
            'id' => 1,
            'pregunta' => '¿Cuál es tu mayor fortaleza?',
            'respuesta' => 'Mi mayor fortaleza es mi capacidad para resolver problemas de manera creativa.',
            'id_cuestionario' => 1, // Suponiendo que tienes un cuestionario asociado
        ]);

        // Puedes agregar más registros de Pregunta si lo deseas
    }
}
