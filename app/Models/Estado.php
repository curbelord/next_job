<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'Estado';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'id_demandante',
        'id_oferta',
    ];

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class, ['id_demandante', 'id_oferta'], ['id_demandante', 'id_oferta']);
    }
}