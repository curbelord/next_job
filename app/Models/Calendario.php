<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $table = 'calendario'; 

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'evento',
        'fecha',
        'hora_inicio',
        'hora_cierre',
        'descripcion',
        'id_seleccionador', 
    ];

    public function seleccionador()
    {
        return $this->belongsTo(Seleccionador::class, 'id_seleccionador', 'id');
    }
}
