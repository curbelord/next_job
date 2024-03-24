<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

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

    public function demandante()
    {
        return $this->hasOne(Demandante::class, 'id', 'id');
    }

    public function seleccionador()
    {
        return $this->hasOne(Seleccionador::class, 'id', 'id');
    }
}

