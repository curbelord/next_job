<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'Pregunta';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'pregunta',
        'respuesta',
        'id_cuestionario', 
    ];

    public function cuestionario()
    {
        return $this->belongsTo(Cuestionario::class, 'id_cuestionario', 'id');
    }
}
