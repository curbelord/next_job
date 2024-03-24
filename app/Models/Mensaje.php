<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensaje';

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'id_emisor',
        'id_receptor',
        'mensaje',
    ];

    public function emisor()
    {
        return $this->belongsTo(Seleccionador::class, 'id_emisor', 'id');
    }

    public function receptor()
    {
        return $this->belongsTo(Demandante::class, 'id_receptor', 'id');
    }
}
