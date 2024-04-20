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
use App\Models\Inscripcion;
use App\Models\Estado;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
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
            'email' => 'juan@gmail.com',
            'telefono' => '+123456789',
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

        User::create([
            'id' => 11,
            'nombre' => 'Pepe',
            'apellidos' => 'Gonzalez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1999-06-15',
            'direccion' => 'Callejon Claro 10',
            'email' => 'pepe@gmail.com',
            'telefono' => '+666600600',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 12,
            'nombre' => 'María',
            'apellidos' => 'Strauss',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1996-02-13',
            'direccion' => 'Calle Alcalá 2',
            'email' => 'mariastrauss@gmail.com',
            'telefono' => '+666601601',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 13,
            'nombre' => 'José Ignacio',
            'apellidos' => 'Ramírez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1990-08-24',
            'direccion' => 'Calle Rosaleda 19',
            'email' => 'joseignaciora@gmail.com',
            'telefono' => '+666602602',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 14,
            'nombre' => 'Magdalena',
            'apellidos' => 'De los Santos',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1983-03-02',
            'direccion' => 'Calle Rodeos 4',
            'email' => 'magdasantos@gmail.com',
            'telefono' => '+666603603',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 15,
            'nombre' => 'Rodrigo',
            'apellidos' => 'Fuentes',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1997-11-28',
            'direccion' => 'Calle Manzanares 84',
            'email' => 'rodrigofuentes@gmail.com',
            'telefono' => '+666604604',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 16,
            'nombre' => 'Jimena',
            'apellidos' => 'Barrios',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1992-07-16',
            'direccion' => 'Calle Esquina del Pensador 25',
            'email' => 'jimenabarrios@gmail.com',
            'telefono' => '+666605605',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 17,
            'nombre' => 'Roberto',
            'apellidos' => 'Martínez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1985-05-12',
            'direccion' => 'Avenida Principal 123',
            'email' => 'robertomartinez@example.com',
            'telefono' => '+123412341',
            'password' => bcrypt('password123'),
        ]);

        User::create([
            'id' => 18,
            'nombre' => 'Laura',
            'apellidos' => 'García',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1990-12-28',
            'direccion' => 'Calle de la Luna 7',
            'email' => 'lauragarcia@example.com',
            'telefono' => '+987654541',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 19,
            'nombre' => 'Carlos',
            'apellidos' => 'González',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1993-08-15',
            'direccion' => 'Calle de la Estrella 12',
            'email' => 'carlosgonzalez@gmail.com',
            'telefono' => '+123456788',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 20,
            'nombre' => 'María',
            'apellidos' => 'Martínez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1995-06-25',
            'direccion' => 'Calle de la Luna 7',
            'email' => 'mariamartinez@gmail.com',
            'telefono' => '+987654542',
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

        Demandante::create([
            'id' => 11,
        ]);

        Demandante::create([
            'id' => 12,
        ]);

        Demandante::create([
            'id' => 13,
        ]);

        Demandante::create([
            'id' => 14,
        ]);

        Demandante::create([
            'id' => 15,
        ]);

        Demandante::create([
            'id' => 16,
        ]);

        Demandante::create([
            'id' => 17,
        ]);

        Demandante::create([
            'id' => 18,
        ]);

        Demandante::create([
            'id' => 19,
        ]);

        Demandante::create([
            'id' => 20,
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

        Empresa::create([
            'id' => 6,
            'nombre' => 'Comidad Sanas',
            'descripcion' => 'Venta de alimentos saludables',
            'ubicacion' => 'Arrecife',
            'logo' => 'comidas_sanas.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 7,
            'nombre' => 'La Parrilla',
            'descripcion' => 'Restaurante de carnes a la parrilla',
            'ubicacion' => 'Arrecife',
            'logo' => 'parrilla.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 8,
            'nombre' => 'Pizza rápida',
            'descripcion' => 'Pizzería de servicio rápido',
            'ubicacion' => 'Costa Teguise',
            'logo' => 'pizza_rapida.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 9,
            'nombre' => 'Mariscos del Sur',
            'descripcion' => 'Restaurante especializado en mariscos',
            'ubicacion' => 'Arrecife',
            'logo' => 'mariscos.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 10,
            'nombre' => 'Restaurante italiano Milano',
            'descripcion' => 'Restaurante gourmet de comida italiana fresca',
            'ubicacion' => 'Arrecife',
            'logo' => 'milano.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 11,
            'nombre' => 'Arquitectos Avada',
            'descripcion' => 'Servicios de arquitectura',
            'ubicacion' => 'Arrecife',
            'logo' => 'avada.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 12,
            'nombre' => 'Inmobiliaria Lanzarote',
            'descripcion' => 'Venta y alquiler de propiedades',
            'ubicacion' => 'Arrecife',
            'logo' => 'inmobiliaria.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 13,
            'nombre' => 'Carpintería Madera',
            'descripcion' => 'Carpintería de madera',
            'ubicacion' => 'Arrecife',
            'logo' => 'carpinteria.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 14,
            'nombre' => 'Electricidad Lanzarote',
            'descripcion' => 'Servicios de electricidad',
            'ubicacion' => 'Arrecife',
            'logo' => 'electricidad.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 15,
            'nombre' => 'Fontanería Lanzarote',
            'descripcion' => 'Servicios de fontanería',
            'ubicacion' => 'Arrecife',
            'logo' => 'fontaneria.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 16,
            'nombre' => 'Pintura Lanzarote',
            'descripcion' => 'Servicios de pintura',
            'ubicacion' => 'Arrecife',
            'logo' => 'pintura.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 17,
            'nombre' => 'Reformas Lanzarote',
            'descripcion' => 'Servicios de reformas',
            'ubicacion' => 'Arrecife',
            'logo' => 'reformas.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 18,
            'nombre' => 'Seguridad Lanzarote',
            'descripcion' => 'Servicios de seguridad',
            'ubicacion' => 'Arrecife',
            'logo' => 'seguridad.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 19,
            'nombre' => 'Limpieza Lanzarote',
            'descripcion' => 'Servicios de limpieza',
            'ubicacion' => 'Arrecife',
            'logo' => 'limpieza.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 20,
            'nombre' => 'Mantenimiento Lanzarote',
            'descripcion' => 'Servicios de mantenimiento',
            'ubicacion' => 'Arrecife',
            'logo' => 'mantenimiento.png',
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

        CV::create([
            'id' => 6,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Obrero',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 11,
        ]);

        CV::create([
            'id' => 7,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Camarero',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 12,
        ]);

        CV::create([
            'id' => 8,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Cocinero',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 13,
        ]);

        CV::create([
            'id' => 9,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Fontanero',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 14,
        ]);

        CV::create([
            'id' => 10,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Electricista',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 15,
        ]);

        CV::create([
            'id' => 11,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Pintor',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 16,
        ]);

        CV::create([
            'id' => 12,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Asesor inmobiliario',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 17,
        ]);

        CV::create([
            'id' => 13,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Segurata',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 18,
        ]);

        CV::create([
            'id' => 14,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Limpieza',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 18,
        ]);

        CV::create([
            'id' => 15,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Mantenimiento',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 20,
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

        Estudios::create([
            'id_cv' => 6,
            'id_estudio' => 2,
            'nombre' => 'Formación Profesional Obras y Servicios',
            'centro_estudios' => 'CIFP XYZ',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 7,
            'id_estudio' => 3,
            'nombre' => 'Formación Profesional Hostelería y Turismo',
            'centro_estudios' => 'CIFP XYZ',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 8,
            'id_estudio' => 4,
            'nombre' => 'Formación Profesional Hostelería y Turismo',
            'centro_estudios' => 'CIFP XYZ',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 9,
            'id_estudio' => 5,
            'nombre' => 'Formación Profesional Fontanería',
            'centro_estudios' => 'CIFP XYZ',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 10,
            'id_estudio' => 6,
            'nombre' => 'Formación Profesional Electricidad',
            'centro_estudios' => 'CIFP XYZ',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 11,
            'id_estudio' => 7,
            'nombre' => 'Formación Profesional Pintura',
            'centro_estudios' => 'CIFP XYZ',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 12,
            'id_estudio' => 8,
            'nombre' => 'Grado en Asesoría Inmobiliaria',
            'centro_estudios' => 'CIFP XYZ',
            'fecha_inicio' => '2016-02-10',
            'fecha_fin' => '2018-06-23',
        ]);

        Estudios::create([
            'id_cv' => 13,
            'id_estudio' => 9,
            'nombre' => 'Formación Profesional Seguridad',
            'centro_estudios' => 'CIFP XYZ',
            'fecha_inicio' => '2013-10-01',
            'fecha_fin' => '2015-07-31',
        ]);

        Estudios::create([
            'id_cv' => 14,
            'id_estudio' => 10,
            'nombre' => 'Formación Profesional Limpieza',
            'centro_estudios' => 'CIFP XYZ',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2017-06-30',
        ]);

        Estudios::create([
            'id_cv' => 15,
            'id_estudio' => 11,
            'nombre' => 'Formación Profesional Mantenimiento',
            'centro_estudios' => 'CIFP XYZ',
            'fecha_inicio' => '2014-09-01',
            'fecha_fin' => '2016-06-30',
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

        Experiencia::create([
            'id_cv' => 6,
            'id_experiencia' => 2,
            'nombre' => 'Obrero',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2016-01-01',
            'fecha_fin' => '2018-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 7,
            'id_experiencia' => 3,
            'nombre' => 'Camarero',
            'centro_laboral' => 'Restaurante XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2017-01-01',
            'fecha_fin' => '2019-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 8,
            'id_experiencia' => 4,
            'nombre' => 'Cocinero',
            'centro_laboral' => 'Restaurante XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2018-01-01',
            'fecha_fin' => '2020-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 9,
            'id_experiencia' => 5,
            'nombre' => 'Fontanero',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2019-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 10,
            'id_experiencia' => 6,
            'nombre' => 'Electricista',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2019-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 11,
            'id_experiencia' => 7,
            'nombre' => 'Pintor',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2019-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 12,
            'id_experiencia' => 8,
            'nombre' => 'Asesor inmobiliario',
            'centro_laboral' => 'Inmobiliaria XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2022-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 13,
            'id_experiencia' => 9,
            'nombre' => 'Segurata',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2019-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 14,
            'id_experiencia' => 10,
            'nombre' => 'Limpieza',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2017-01-01',
            'fecha_fin' => '2019-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 15,
            'id_experiencia' => 11,
            'nombre' => 'Mantenimiento',
            'centro_laboral' => 'Empresa XYZ',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2016-01-01',
            'fecha_fin' => '2018-12-31',
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Borrador',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Borrador',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Borrador',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 4,
        ]);

        Oferta::create([
            'referencia' => 8,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 9,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 10,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 11,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 12,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 13,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 14,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 15,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 16,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 17,
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
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 18,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Programador',
            'descripcion' => 'Se busca programador con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 19,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 2,
            'salario' => 2000.00,
            'jornada' => 'Completa',
            'sector' => 'Construcción',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Albañil',
            'descripcion' => 'Se busca albañil con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
            'id_seleccionador' => 4,
        ]);

        Oferta::create([
            'referencia' => 20,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 1,
            'salario' => 1000.00,
            'jornada' => 'Completa',
            'sector' => 'Servicios Turísticos y Hosteleros',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Camarero',
            'descripcion' => 'Se busca camarero con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 6,
        ]);

        Oferta::create([
            'referencia' => 21,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Energía',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Electricista',
            'descripcion' => 'Se busca electricista con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
            'id_seleccionador' => 8,
        ]);

        Oferta::create([
            'referencia' => 22,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 2,
            'salario' => 2000.00,
            'jornada' => 'Completa',
            'sector' => 'Energía',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Fontanero',
            'descripcion' => 'Se busca fontanero con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 10,
        ]);

        Oferta::create([
            'referencia' => 23,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 1,
            'salario' => 1000.00,
            'jornada' => 'Completa',
            'sector' => 'Mantenimiento',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Pintor',
            'descripcion' => 'Se busca pintor con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 24,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Construcción',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Asesor inmobiliario',
            'descripcion' => 'Se busca asesor inmobiliario con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'id_seleccionador' => 4,
        ]);

        Oferta::create([
            'referencia' => 25,
            'fecha_cierre' => '2024-03-15',
            'numero_vacantes' => 2,
            'salario' => 2000.00,
            'jornada' => 'Completa',
            'sector' => 'Logística, Transporte y Comercio',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Segurata',
            'descripcion' => 'Se busca segurata con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
            'id_seleccionador' => 6,
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
            'id_oferta' => 1,
            'anotacion' => 'Fuera de plazo de inscripción',
        ]);

        Inscripcion::create([
            'id_demandante' => 1,
            'id_oferta' => 6,
            'anotacion' => 'Pendiente de revisión',
        ]);

        Inscripcion::create([
            'id_demandante' => 3,
            'id_oferta' => 1,
            'anotacion' => 'Rechazado por el seleccionador',
        ]);

        Inscripcion::create([
            'id_demandante' => 11,
            'id_oferta' => 1,
            'anotacion' => 'Interesante',
        ]);

        Inscripcion::create([
            'id_demandante' => 12,
            'id_oferta' => 1,
            'anotacion' => 'Pendiente de revisión',
        ]);

        Inscripcion::create([
            'id_demandante' => 13,
            'id_oferta' => 1,
            'anotacion' => 'Perfil no apto, pero se mantiene en reserva',
        ]);

        Inscripcion::create([
            'id_demandante' => 14,
            'id_oferta' => 1,
            'anotacion' => 'Pendiente de entrevista',
        ]);

        Inscripcion::create([
            'id_demandante' => 15,
            'id_oferta' => 1,
            'anotacion' => 'Rechazado por el seleccionador',
        ]);

        Inscripcion::create([
            'id_demandante' => 16,
            'id_oferta' => 1,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 17,
            'id_oferta' => 1,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 18,
            'id_oferta' => 1,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 19,
            'id_oferta' => 1,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 20,
            'id_oferta' => 1,
            'anotacion' => '',
        ]);
        
        Inscripcion::create([
            'id_demandante' => 19,
            'id_oferta' => 2,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 20,
            'id_oferta' => 2,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 19,
            'id_oferta' => 20,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 20,
            'id_oferta' => 23,
            'anotacion' => '',
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
            'nombre' => 'Entrevista negativa',
            'descripcion' => 'Falló en la entrevista de trabajo',
            'id_demandante' => 7,
            'id_oferta' => 4,
        ]);

        Estado::create([
            'id' => 6,
            'nombre' => 'Descartado',
            'descripcion' => 'Falló en la entrevista de trabajo',
            'id_demandante' => 7,
            'id_oferta' => 4,
        ]);

        Estado::create([
            'id' => 7,
            'nombre' => 'Descartado',
            'descripcion' => 'Fuera de plazo de inscripción',
            'id_demandante' => 9,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 8,
            'nombre' => 'CV leído',
            'descripcion' => 'Pendiente de revisión',
            'id_demandante' => 1,
            'id_oferta' => 6,
        ]);

        Estado::create([
            'id' => 9,
            'nombre' => 'Descartado',
            'descripcion' => 'Rechazado por el seleccionador',
            'id_demandante' => 3,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 10,
            'nombre' => 'Preseleccionado',
            'descripcion' => 'Interesante',
            'id_demandante' => 11,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 11,
            'nombre' => 'CV leído',
            'descripcion' => 'Pendiente de revisión',
            'id_demandante' => 12,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 12,
            'nombre' => 'CV leído',
            'descripcion' => 'Perfil no apto, pero se mantiene en reserva',
            'id_demandante' => 13,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 13,
            'nombre' => 'Seleccionado para entrevista',
            'descripcion' => 'Pendiente de entrevista',
            'id_demandante' => 14,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 14,
            'nombre' => 'Descartado',
            'descripcion' => 'Rechazado por el seleccionador',
            'id_demandante' => 15,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 15,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 16,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 16,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 17,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 17,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 18,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 18,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 19,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 19,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 20,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 20,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 19,
            'id_oferta' => 2,
        ]);

        Estado::create([
            'id' => 21,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 20,
            'id_oferta' => 2,
        ]);

        Estado::create([
            'id' => 22,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 19,
            'id_oferta' => 20,
        ]);

        Estado::create([
            'id' => 23,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 20,
            'id_oferta' => 23,
        ]);

        // ROLES

        Role::create(['name' => 'demandante']);
        Role::create(['name' => 'seleccionador']);

    }
}