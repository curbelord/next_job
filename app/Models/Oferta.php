<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'Oferta'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'referencia'; // Clave primaria de la tabla

    public $timestamps = false; // Indica si la tabla tiene los campos created_at y updated_at

    protected $fillable = [
        'referencia',
        'fecha_publicacion',
        'fecha_cierre',
        'numero_vacantes',
        'salario',
        'jornada',
        'sector',
        'tipo_trabajo',
        'puesto_trabajo',
        'vacante_especial',
        'descripcion',
        'estudios_minimos',
        'experiencia_minima',
        'ubicacion',
        'turno',
        'horario',
        'idioma',
        'borrador',
        'id_seleccionador', // Suponiendo que tienes una relación con la tabla Seleccionador
    ];

    // Define la relación con la tabla Seleccionador
    public function seleccionador()
    {
        return $this->belongsTo(Seleccionador::class, 'id_seleccionador', 'id');
    }

    // Define otras relaciones si las hubiera, por ejemplo, con la tabla Inscripcion
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'id_oferta', 'referencia');
    }
}
