<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Demandante;
use App\Models\Empresa;
use App\Models\Seleccionador;
use App\Models\CV;
use App\Models\Estudios;
use App\Models\Experiencia;
use App\Models\Oferta;
use App\Models\Calendario;
use App\Models\Mensaje;
use App\Models\Inscripcion;
use App\Models\Estado;
use App\Models\Cuestionario;
use App\Models\Pregunta;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;


class DDBBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // USUARIOS

        User::create([
            'id' => 1,
            'nombre' => 'Juan',
            'apellidos' => 'Perez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1990-05-15',
            'direccion' => 'Calle Mayor 123',
            'telefono' => '+123456789',
            'email' => 'juan@gmail.com',
            //'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 2,
            'nombre' => 'Maria',
            'apellidos' => 'Gonzalez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1995-08-25',
            'direccion' => 'Avenida Central 456',
            'email' => 'maria@gmail.com',
            'telefono' => '+987654321',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 3,
            'nombre' => 'Carlos',
            'apellidos' => 'Rodriguez',
            'genero' => 'Otro',
            'fecha_nacimiento' => '1988-12-10',
            'direccion' => 'Plaza Mayor 789',
            'email' => 'carlos@gmail.com',
            'telefono' => '+111222333',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 4,
            'nombre' => 'Ana',
            'apellidos' => 'Lopez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1992-03-20',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'ana@gmail.com',
            'telefono' => '+444555666',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 5,
            'nombre' => 'Pedro',
            'apellidos' => 'Martinez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1993-07-30',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'pedro@gmail.com',
            'telefono' => '+777888999',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 6,
            'nombre' => 'Laura',
            'apellidos' => 'Sanchez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1994-09-05',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'laura@gmail.com',
            'telefono' => '+000111222',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 7,
            'nombre' => 'Sara',
            'apellidos' => 'Garcia',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1996-11-15',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'sara@gmail.com',
            'telefono' => '+333444555',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 8,
            'nombre' => 'Javier',
            'apellidos' => 'Fernandez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1997-01-25',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'javier@gmail.com',
            'telefono' => '+666777888',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 9,
            'nombre' => 'Carmen',
            'apellidos' => 'Jimenez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1998-04-05',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'carmen@gmail.com',
            'telefono' => '+999000111',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 10,
            'nombre' => 'Antonio',
            'apellidos' => 'Ruiz',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1999-06-15',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'antonio@gmail.com',
            'telefono' => '+222333444',
            'password' => bcrypt('password'),
        ]);

        // DEMANDANTES

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

        // EMPRESAS

        Empresa::create([
            'id' => 1,
            'nombre' => 'Artek',
            'descripcion' => 'Empresa de desarrollo de software',
            'ubicacion' => 'Arrecife',
            'logo' => 'artek.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 2,
            'nombre' => 'Biosfera',
            'descripcion' => 'Empresa de desarrollo de videojuegos',
            'ubicacion' => 'Teguise',
            'logo' => 'biosfera.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 3,
            'nombre' => 'Cactus',
            'descripcion' => 'Vivero de plantas',
            'ubicacion' => 'Yaiza',
            'logo' => 'cactus.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 4,
            'nombre' => 'Dunas',
            'descripcion' => 'Empresa de desarrollo de páginas web',
            'ubicacion' => 'Tías',
            'logo' => 'dunas.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 5,
            'nombre' => 'Estrella',
            'descripcion' => 'Restaurante de comida rápida',
            'ubicacion' => 'Tinajo',
            'logo' => 'estrella.png',
            'password' => bcrypt('password'),
        ]);

        // SELECCIONADORES

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

        // CV

        CV::create([
            'id' => 1,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 1,
        ]);

        CV::create([
            'id' => 2,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 3,
        ]);

        CV::create([
            'id' => 3,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 5,
        ]);

        CV::create([
            'id' => 4,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 7,
        ]);

        CV::create([
            'id' => 5,
            'jornada_laboral' => 'Tiempo parcial',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 9,
        ]);

        // Estudios

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

        // Experiencia

        Experiencia::create([
            'id_cv' => 1,
            'id_experiencia' => 1,
            'nombre' => 'Desarrollador web',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 2,
            'id_experiencia' => 1,
            'nombre' => 'Desarrollador web',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 3,
            'id_experiencia' => 1,
            'nombre' => 'Desarrollador web',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 4,
            'id_experiencia' => 1,
            'nombre' => 'Desarrollador web',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 5,
            'id_experiencia' => 1,
            'nombre' => 'Desarrollador web',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        // Oferta

        Oferta::create([
            'referencia' => 1,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 2,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 2,
            'salario' => 2000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'id_seleccionador' => 4,
        ]);

        Oferta::create([
            'referencia' => 3,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 1,
            'salario' => 1000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'estado' => 'Plantilla',
            'curriculums_ciegos' => 'NO',
            'id_seleccionador' => 6,
        ]);

        Oferta::create([
            'referencia' => 4,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'estado' => 'Borrador',
            'curriculums_ciegos' => 'SI',
            'id_seleccionador' => 8,
        ]);

        Oferta::create([
            'referencia' => 5,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 2,
            'salario' => 2000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'id_seleccionador' => 10,
        ]);

        Oferta::create([
            'referencia' => 6,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 1,
            'salario' => 1000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
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
            'referencia' => 7,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'turno' => 'Mañana',
            'estado' => 'Plantilla',
            'curriculums_ciegos' => 'NO',
            'id_seleccionador' => 4,
        ]);

        // Calendario

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

        // Mensaje

        Mensaje::create([
            'id' => 1,
            'id_emisor' => 2,
            'id_receptor' => 1,
            'mensaje' => 'Hola, ¿cómo estás?',
        ]);

        // Inscripcion

        Inscripcion::create([
            'id_demandante' => 1,
            'id_oferta' => 1,
            'anotacion' => 'Interesado en la oferta',
        ]);

        Inscripcion::create([
            'id_demandante' => 3,
            'id_oferta' => 2,
            'anotacion' => 'Cancelado por el demandante',
        ]);

        Inscripcion::create([
            'id_demandante' => 5,
            'id_oferta' => 3,
            'anotacion' => 'Candidato seleccionado',
        ]);

        Inscripcion::create([
            'id_demandante' => 7,
            'id_oferta' => 4,
            'anotacion' => 'Falló en la entrevista de trabajo',
        ]);

        Inscripcion::create([
            'id_demandante' => 9,
            'id_oferta' => 5,
            'anotacion' => 'Fuera de plazo de inscripción',
        ]);

        Inscripcion::create([
            'id_demandante' => 1,
            'id_oferta' => 6,
            'anotacion' => 'Pendiente de revisión',
        ]);

        Inscripcion::create([
            'id_demandante' => 3,
            'id_oferta' => 7,
            'anotacion' => 'Rechazado por el seleccionador',
        ]);

        // Estado

        Estado::create([
            'id' => 1,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 1,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 2,
            'nombre' => 'Preseleccionado',
            'descripcion' => 'Candidato preseleccionado',
            'id_demandante' => 1,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 3,
            'nombre' => 'Descartado',
            'descripcion' => 'Cancelado por el demandante',
            'id_demandante' => 3,
            'id_oferta' => 2,
        ]);

        Estado::create([
            'id' => 4,
            'nombre' => 'Seleccionado para entrevista',
            'descripcion' => 'Candidato seleccionado',
            'id_demandante' => 5,
            'id_oferta' => 3,
        ]);

        Estado::create([
            'id' => 5,
            'nombre' => 'Descartado',
            'descripcion' => 'Falló en la entrevista de trabajo',
            'id_demandante' => 7,
            'id_oferta' => 4,
        ]);

        // Cuestionario

        Cuestionario::create([
            'fecha' => Carbon::now(),
            'tipo' => 'Prueba técnica',
            'id_seleccionador' => 2,
            'id_demandante' => 1,
            'id_oferta' => 1,
        ]);

        Cuestionario::create([
            'fecha' => Carbon::now(),
            'tipo' => 'Prueba técnica',
            'id_seleccionador' => 4,
            'id_demandante' => 3,
            'id_oferta' => 2,
        ]);

        // Pregunta

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

        // ROLES

        Role::create(['name' => 'demandante']);
        Role::create(['name' => 'seleccionador']);

        // Posibles tablas a añadir:
        // Chat, Mensaje, Notificacion, Solicitud, Valoracion, Cita, Entrevista, Prueba, Test, Resultado, Evento
    }
}
