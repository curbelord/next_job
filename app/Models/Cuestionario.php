<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'cuestionario';

    // Nombre de la clave primaria
    protected $primaryKey = 'id';

    // Los campos que pueden ser asignados masivamente
    protected $fillable = [
        
        'fecha',
        'tipo',
        'id_seleccionador',
        'id_demandante',
        'id_oferta',
    ];

    // Relación con el modelo Seleccionador
    public function seleccionador()
    {
        return $this->belongsTo(Seleccionador::class, 'id_seleccionador', 'id');
    }

    // Relación con el modelo Demandante
    public function demandante()
    {
        return $this->belongsTo(Demandante::class, 'id_demandante', 'id');
    }

    // Relación con el modelo Oferta
    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'id_oferta', 'referencia');
    }

    // Relación con el modelo Pregunta
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'id_cuestionario', 'id');
    }
}
