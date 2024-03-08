<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $table = 'Calendario'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    public $timestamps = false; // Indica si la tabla tiene los campos created_at y updated_at

    protected $fillable = [
        'id',
        'evento',
        'fecha',
        'hora_inicio',
        'hora_cierre',
        'descripcion',
        'id_seleccionador', // Suponiendo que tienes una relación con la tabla Seleccionador
    ];

    // Define la relación con la tabla Seleccionador
    public function seleccionador()
    {
        return $this->belongsTo(Seleccionador::class, 'id_seleccionador', 'id');
    }
}
