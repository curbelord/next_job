<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'oferta';

    protected $primaryKey = 'referencia';

    // public $timestamps = false;

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
        'id_seleccionador',
    ];

    public function seleccionador()
    {
        return $this->belongsTo(Seleccionador::class, 'id_seleccionador', 'id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'id_oferta', 'referencia');
    }
}
