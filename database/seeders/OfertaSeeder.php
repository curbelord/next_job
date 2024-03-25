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

        Oferta::create([
            'referencia' => 1,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Tiempo completo',
            'sector' => 'Tecnología',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 2,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 2,
            'salario' => 2000.00,
            'jornada' => 'Tiempo completo',
            'sector' => 'Tecnología',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'borrador' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'id_seleccionador' => 4,
        ]);

        Oferta::create([
            'referencia' => 3,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 1,
            'salario' => 1000.00,
            'jornada' => 'Tiempo completo',
            'sector' => 'Tecnología',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'borrador' => 'Plantilla',
            'curriculums_ciegos' => 'SI',
            'id_seleccionador' => 6,
        ]);

        Oferta::create([
            'referencia' => 4,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Tiempo completo',
            'sector' => 'Tecnología',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'borrador' => 'Borrador',
            'curriculums_ciegos' => 'NO',
            'id_seleccionador' => 8,
        ]);

        Oferta::create([
            'referencia' => 5,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 2,
            'salario' => 2000.00,
            'jornada' => 'Tiempo completo',
            'sector' => 'Tecnología',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'borrador' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'id_seleccionador' => 10,
        ]);

        Oferta::create([
            'referencia' => 6,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 1,
            'salario' => 1000.00,
            'jornada' => 'Tiempo completo',
            'sector' => 'Tecnología',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'borrador' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 7,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Tiempo completo',
            'sector' => 'Tecnología',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'borrador' => 'Plantilla',
            'curriculums_ciegos' => 'NO',
            'id_seleccionador' => 4,
        ]);

    }
}
