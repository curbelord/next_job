<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $table = 'CV'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    protected $fillable = [
        'id',
        'jornada_laboral',
        'puesto_trabajo',
        'tipo_trabajo',
        'id_demandante', // Suponiendo que tienes una relación con la tabla Demandante
        // Otros campos de la tabla CV si los hubiera
    ];

    // Define la relación con la tabla Demandante
    public function demandante()
    {
        return $this->belongsTo(Demandante::class, 'id_demandante', 'id');
    }

    // Define relaciones con otras tablas si las hubiera, como Estudios y Experiencia
    public function estudios()
    {
        return $this->hasMany(Estudios::class, 'id_cv', 'id');
    }

    public function experiencia()
    {
        return $this->hasMany(Experiencia::class, 'id_cv', 'id');
    }
}
