<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Oferta;

class OfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo para Oferta
        Oferta::create([
            'referencia' => 1,
            'fecha_publicacion' => '2024-03-08',
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Tiempo completo',
            'sector' => 'Tecnología',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'vacante_especial' => 'No',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'horario' => '9:00 - 18:00',
            'idioma' => 'Inglés',
            'borrador' => 'No',
            'id_seleccionador' => 2, // Suponiendo que tienes un seleccionador asociado
        ]);

        // Puedes agregar más registros de Oferta si lo deseas
    }
}
