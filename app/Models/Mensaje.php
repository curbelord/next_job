<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'Mensaje'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    public $timestamps = false; // Indica si la tabla tiene los campos created_at y updated_at

    protected $fillable = [
        'id',
        'id_emisor',
        'id_receptor',
        'mensaje',
    ];

    // Define la relación con la tabla Seleccionador como emisor
    public function emisor()
    {
        return $this->belongsTo(Seleccionador::class, 'id_emisor', 'id');
    }

    // Define la relación con la tabla Demandante como receptor
    public function receptor()
    {
        return $this->belongsTo(Demandante::class, 'id_receptor', 'id');
    }
}
