<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('Usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->enum('genero', ['Hombre', 'Mujer', 'Otro'])->nullable();
            $table->date('fecha_nacimiento');
            $table->string('direccion')->nullable();
            $table->string('correo')->unique();
            $table->string('telefono')->unique();
            $table->timestamps();
        });

        // Demandante Table
        Schema::create('Demandante', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('id')->references('id')->on('Usuario')->onDelete('cascade');
            $table->timestamps();
        });

        // Empresa Table
        Schema::create('Empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('ubicacion');
            $table->timestamps();
        });

        // Seleccionador Table
        Schema::create('Seleccionador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_empresa')->unsigned();
            $table->foreign('id')->references('id')->on('Usuario')->onDelete('cascade');
            $table->foreign('id_empresa')->references('id')->on('Empresa')->onDelete('cascade');
            $table->timestamps();
        });

        // CV Table
        Schema::create('CV', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jornada_laboral');
            $table->string('puesto_trabajo');
            $table->string('tipo_trabajo');
            $table->integer('id_demandante')->unsigned();
            $table->foreign('id_demandante')->references('id')->on('Demandante')->onDelete('cascade');
            $table->timestamps();
        });

        // Estudios Table
        Schema::create('Estudios', function (Blueprint $table) {
            $table->integer('id_cv')->unsigned();
            $table->integer('id_estudio');
            $table->string('nombre');
            $table->string('centro_estudios');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreign('id_cv')->references('id')->on('CV')->onDelete('cascade');
            $table->primary(['id_cv', 'id_estudio']);
        });

        // Experiencia Table
        Schema::create('Experiencia', function (Blueprint $table) {
            $table->integer('id_cv')->unsigned();
            $table->integer('id_experiencia');
            $table->string('nombre');
            $table->string('centro_laboral');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreign('id_cv')->references('id')->on('CV')->onDelete('cascade');
            $table->primary(['id_cv', 'id_experiencia']);
        });

        // Oferta Table
        Schema::create('Oferta', function (Blueprint $table) {
            $table->id('referencia');
            $table->date('fecha_cierre');
            $table->integer('numero_vacantes');
            $table->decimal('salario', 10, 2);
            $table->string('jornada');
            $table->enum('sector', ['afde', 'ages', 'agro', 'agra', 'cons', 'ener', 'imap', 'imas', 'indu', 'icom', 'ltco', 'mant', 'mamb', 'quim', 'salu', 'stho', 'text']);
            // $table->string('tipo_trabajo')->nullable();
            $table->string('puesto_trabajo');
            $table->string('descripcion');
            $table->enum('estudios_minimos', ['ge', 'eso', 'bac', 'gm', 'gs', 'ea', 'ed', 'luni', 'muni', 'duni', 'guni']);
            $table->integer('experiencia_minima');
            $table->string('ubicacion');
            $table->enum('turno', ['manana', 'tarde', 'noche']);
            $table->enum('estado', ['publicada', 'plantilla'])->nullable();
            $table->integer('id_seleccionador')->unsigned()->nullable();
            $table->foreign('id_seleccionador')->references('id')->on('Seleccionador')->onDelete('cascade');
            $table->timestamps();
        });

        // Calendario Table
        Schema::create('Calendario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('evento');
            $table->date('fecha');
            $table->string('hora_inicio');
            $table->string('hora_cierre');
            $table->string('descripcion');
            $table->integer('id_seleccionador')->unsigned();
            $table->foreign('id_seleccionador')->references('id')->on('Seleccionador')->onDelete('cascade');
            $table->timestamps();
        });

        // Mensaje Table
        Schema::create('Mensaje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_emisor')->unsigned();
            $table->integer('id_receptor')->unsigned();
            $table->string('mensaje');
            $table->foreign('id_emisor')->references('id')->on('Seleccionador')->onDelete('cascade');
            $table->foreign('id_receptor')->references('id')->on('Demandante')->onDelete('cascade');
            $table->timestamps();
        });

        // Inscripcion Table
        Schema::create('Inscripcion', function (Blueprint $table) {
            $table->integer('id_demandante')->unsigned();
            $table->unsignedBigInteger('id_oferta');
            $table->string('anotacion');
            $table->primary(['id_demandante', 'id_oferta']);
            $table->foreign('id_demandante')->references('id')->on('Demandante')->onDelete('cascade');
            $table->foreign('id_oferta')->references('referencia')->on('Oferta')->onDelete('cascade');
            $table->timestamps();
        });

        // Cuestionario Table
        Schema::create('Cuestionario', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('tipo');
            $table->integer('id_seleccionador')->unsigned();
            $table->integer('id_demandante')->unsigned();
            $table->unsignedBigInteger('id_oferta');
            $table->foreign('id_seleccionador')->references('id')->on('Seleccionador')->onDelete('cascade');
            $table->foreign('id_demandante')->references('id_demandante')->on('Inscripcion')->onDelete('cascade');
            $table->foreign('id_oferta')->references('id_oferta')->on('Inscripcion')->onDelete('cascade');
            $table->timestamps();
        });

        // Pregunta Table
        Schema::create('Pregunta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pregunta');
            $table->string('respuesta');
            $table->integer('id_cuestionario')->unsigned();
            $table->foreign('id_cuestionario')->references('id')->on('Cuestionario')->onDelete('cascade');
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
        Schema::dropIfExists('Pregunta');
        Schema::dropIfExists('Cuestionario');
        Schema::dropIfExists('Inscripcion');
        Schema::dropIfExists('Mensaje');
        Schema::dropIfExists('Calendario');
        Schema::dropIfExists('Oferta');
        Schema::dropIfExists('Experiencia');
        Schema::dropIfExists('Estudios');
        Schema::dropIfExists('CV');
        Schema::dropIfExists('Seleccionador');
        Schema::dropIfExists('Empresa');
        Schema::dropIfExists('Demandante');
        Schema::dropIfExists('Usuario');
    }
};
