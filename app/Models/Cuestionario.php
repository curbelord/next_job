<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $table = 'Cuestionario'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    public $timestamps = false; // Indica si la tabla tiene los campos created_at y updated_at

    protected $fillable = [
        'id',
        'fecha',
        'tipo',
    ];

    // Define la relación con la tabla Pregunta
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'id_cuestionario', 'id');
    }
}
