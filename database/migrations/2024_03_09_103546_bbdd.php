<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Users
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->enum('genero', ['Hombre', 'Mujer', 'Otro'])->nullable();
            $table->date('fecha_nacimiento');
            $table->string('direccion')->nullable();
            $table->string('email')->unique();
            $table->string('telefono')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Demandante
        Schema::create('demandante', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        // Empresa
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('ubicacion');
            $table->string('logo');
            $table->string('password');
            $table->timestamps();
        });

        // Seleccionador
        Schema::create('seleccionador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_empresa')->unsigned()->nullable();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            $table->timestamps();
        });

        // CV
        Schema::create('cv', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jornada_laboral');
            $table->string('puesto_trabajo');
            $table->string('tipo_trabajo');
            $table->integer('id_demandante')->unsigned();
            $table->foreign('id_demandante')->references('id')->on('demandante')->onDelete('cascade');
            $table->timestamps();
        });

        // Estudios
        Schema::create('estudios', function (Blueprint $table) {
            $table->integer('id_cv')->unsigned();
            $table->integer('id_estudio');
            $table->string('nombre');
            $table->string('centro_estudios');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreign('id_cv')->references('id')->on('cv')->onDelete('cascade');
            $table->primary(['id_cv', 'id_estudio']);
        });

        // Experiencia
        Schema::create('experiencia', function (Blueprint $table) {
            $table->integer('id_cv')->unsigned();
            $table->integer('id_experiencia');
            $table->string('nombre');
            $table->string('centro_laboral');
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreign('id_cv')->references('id')->on('cv')->onDelete('cascade');
            $table->primary(['id_cv', 'id_experiencia']);
        });

        // Oferta
        Schema::create('oferta', function (Blueprint $table) {
            $table->id('referencia');
            $table->date('fecha_cierre');
            $table->integer('numero_vacantes');
            $table->decimal('salario', 10, 2);
            $table->enum('jornada', ['Completa', 'Parcial']);
            $table->enum('sector', ['Actividades Físicas y Deportivas', 'Administración y Gestión', 'Agroalimentario', 'Artes Gráficas', 'Construcción', 'Energía', 'Imagen Personal', 'Imagen y Sonido', 'Industrial', 'Informática y Comunicaciones', 'Logística, Transporte y Comercio', 'Mantenimiento', 'Medio Ambiente', 'Químico', 'Salud', 'Servicios Turísticos y Hosteleros', 'Textil']);
            $table->enum('tipo_trabajo', ['Presencial', 'No presencial', 'Mixto']);
            $table->string('puesto_trabajo');
            $table->string('descripcion');
            $table->enum('estudios_minimos', ['Graduado Escolar', 'ESO', 'Bachillerato', 'Formación Profesional Básica', 'Ciclo Formativo de Grado Medio', 'Ciclo Formativo de Grado Superior', 'Enseñanzas artísticas', 'Enseñanzas deportivas', 'Licenciatura', 'Máster', 'Doctorado', 'Grado Universitario', 'No requerida']);
            $table->integer('experiencia_minima');
            $table->string('ubicacion');
            $table->enum('turno', ['Mañana', 'Tarde', 'Noche']);
            $table->enum('estado', ['Publicada', 'Plantilla', 'Borrador'])->nullable();
            $table->enum('curriculums_ciegos', ["SI", "NO"]);
            $table->integer('id_seleccionador')->unsigned()->nullable();
            $table->foreign('id_seleccionador')->references('id')->on('seleccionador')->onDelete('cascade');
            $table->timestamps();
        });

        // Calendario
        Schema::create('calendario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('evento');
            $table->date('fecha');
            $table->string('hora_inicio');
            $table->string('hora_cierre');
            $table->string('descripcion');
            $table->integer('id_seleccionador')->unsigned();
            $table->foreign('id_seleccionador')->references('id')->on('seleccionador')->onDelete('cascade');
            $table->timestamps();
        });

        // Mensaje
        Schema::create('mensaje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_emisor')->unsigned();
            $table->integer('id_receptor')->unsigned();
            $table->string('mensaje');
            $table->foreign('id_emisor')->references('id')->on('seleccionador')->onDelete('cascade');
            $table->foreign('id_receptor')->references('id')->on('demandante')->onDelete('cascade');
            $table->timestamps();
        });

        // Inscripcion
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->integer('id_demandante')->unsigned();
            $table->unsignedBigInteger('id_oferta');
            $table->string('anotacion');
            $table->primary(['id_demandante', 'id_oferta']);
            $table->foreign('id_demandante')->references('id')->on('demandante')->onDelete('cascade');
            $table->foreign('id_oferta')->references('referencia')->on('oferta')->onDelete('cascade');
            $table->timestamps();
        });

        // Estado
        Schema::create('estado', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('nombre', ['Inscrito', 'CV leído', 'Preseleccionado', 'Seleccionado para entrevista', 'Entrevistado', 'Descartado']);
            $table->string('descripcion');
            $table->integer('id_demandante')->unsigned();
            $table->unsignedBigInteger('id_oferta');
            $table->foreign(['id_demandante', 'id_oferta'])->references(['id_demandante', 'id_oferta'])->on('inscripcion')->onDelete('cascade');
            $table->timestamps();
        });

        // Cuestionario
        Schema::create('cuestionario', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('tipo');
            $table->integer('id_seleccionador')->unsigned();
            $table->integer('id_demandante')->unsigned();
            $table->unsignedBigInteger('id_oferta');
            $table->foreign('id_seleccionador')->references('id')->on('seleccionador')->onDelete('cascade');
            $table->foreign('id_demandante')->references('id_demandante')->on('inscripcion')->onDelete('cascade');
            $table->foreign('id_oferta')->references('id_oferta')->on('inscripcion')->onDelete('cascade');
            $table->timestamps();
        });

        // Pregunta
        Schema::create('pregunta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pregunta');
            $table->string('respuesta');
            $table->integer('id_cuestionario')->unsigned();
            $table->foreign('id_cuestionario')->references('id')->on('cuestionario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregunta');
        Schema::dropIfExists('cuestionario');
        Schema::dropIfExists('estado');
        Schema::dropIfExists('inscripcion');
        Schema::dropIfExists('mensaje');
        Schema::dropIfExists('calendario');
        Schema::dropIfExists('oferta');
        Schema::dropIfExists('experiencia');
        Schema::dropIfExists('estudios');
        Schema::dropIfExists('cv');
        Schema::dropIfExists('seleccionador');
        Schema::dropIfExists('empresa');
        Schema::dropIfExists('demandante');
        Schema::dropIfExists('users');
    }
};
