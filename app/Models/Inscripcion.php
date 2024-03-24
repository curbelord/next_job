<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripcion';

    protected $primaryKey = ['id_demandante', 'id_oferta'];

    public $incrementing = false;
    
    protected $fillable = [
        'id_demandante',
        'id_oferta',
        'anotacion'
    ];

    public function demandante()
    {
        return $this->belongsTo(Demandante::class, 'id_demandante', 'id');
    }

    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'id_oferta', 'referencia');
    }
}