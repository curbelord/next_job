<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'Inscripcion';
    protected $primaryKey = ['id_demandante', 'id_oferta'];
    public $incrementing = false;
    protected $fillable = [
        'id_demandante',
        'id_oferta',
        'anotacion'
    ];

    // Relación con el Demandante
    public function demandante()
    {
        return $this->belongsTo(Demandante::class, 'id_demandante', 'id');
    }

    // Relación con la Oferta
    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'id_oferta', 'referencia');
    }
}