<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'Empresa'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'ubicacion',
        // Otros campos de la tabla Empresa si los hubiera
    ];

    // Define la relación con la tabla Seleccionador
    public function seleccionadores()
    {
        return $this->hasMany(Seleccionador::class, 'id_empresa', 'id');
    }

    // Define otras relaciones si las hubiera, por ejemplo, con la tabla Oferta
    public function ofertas()
    {
        return $this->hasMany(Oferta::class, 'id_empresa', 'id');
    }
}
