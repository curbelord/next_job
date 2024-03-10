<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $table = 'cuestionario';

    protected $primaryKey = 'id';

    protected $fillable = [
        
        'fecha',
        'tipo',
        'id_seleccionador',
        'id_demandante',
        'id_oferta',
    ];

    public function seleccionador()
    {
        return $this->belongsTo(Seleccionador::class, 'id_seleccionador', 'id');
    }

    public function demandante()
    {
        return $this->belongsTo(Demandante::class, 'id_demandante', 'id');
    }

    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'id_oferta', 'referencia');
    }

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'id_cuestionario', 'id');
    }
}
