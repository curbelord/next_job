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
        Pregunta::create([
            'id' => 1,
            'pregunta' => '¿Cuál es tu mayor fortaleza?',
            'respuesta' => 'Mi mayor fortaleza es mi capacidad para resolver problemas de manera creativa.',
            'id_cuestionario' => 1, 
        ]);

        Pregunta::create([
            'id' => 2,
            'pregunta' => '¿Cuál es tu mayor debilidad?',
            'respuesta' => 'Mi mayor debilidad es que a veces me cuesta delegar tareas.',
            'id_cuestionario' => 1, 
        ]);

    }
}
