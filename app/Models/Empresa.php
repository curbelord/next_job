<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'Empresa'; 

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'ubicacion',
    ];

    public function seleccionadores()
    {
        return $this->hasMany(Seleccionador::class, 'id_empresa', 'id');
    }

    public function ofertas()
    {
        return $this->hasMany(Oferta::class, 'id_empresa', 'id');
    }
}
