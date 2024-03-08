<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'Pregunta'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    public $timestamps = false; // Indica si la tabla tiene los campos created_at y updated_at

    protected $fillable = [
        'id',
        'pregunta',
        'respuesta',
        'id_cuestionario', // Suponiendo que tienes una relación con la tabla Cuestionario
    ];

    // Define la relación con la tabla Cuestionario
    public function cuestionario()
    {
        return $this->belongsTo(Cuestionario::class, 'id_cuestionario', 'id');
    }
}
