<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'Usuario'; 

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'nombre',
        'apellidos',
        'genero',
        'fecha_nacimiento',
        'direccion',
        'correo',
        'telefono',
    ];

    // Define las relaciones con otras tablas si las hay
    public function demandante()
    {
        return $this->hasOne(Demandante::class, 'id', 'id');
    }

    public function seleccionador()
    {
        return $this->hasOne(Seleccionador::class, 'id', 'id');
    }
}

