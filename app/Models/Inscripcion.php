<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'Inscripcion'; // Nombre de la tabla en la base de datos

    // La tabla Inscripcion no tiene una clave primaria propia
    protected $primaryKey = null;

    public $incrementing = false; // Indica si la clave primaria es autoincremental

    public $timestamps = false; // Indica si la tabla tiene los campos created_at y updated_at

    protected $fillable = [
        'id_demandante',
        'id_oferta',
        'anotacion',
        'cuestionario', // Suponiendo que tienes una relación con la tabla Cuestionario
    ];

    // Define la relación con la tabla Demandante
    public function demandante()
    {
        return $this->belongsTo(Demandante::class, 'id_demandante', 'id');
    }

    // Define la relación con la tabla Oferta
    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'id_oferta', 'referencia');
    }

    // Define la relación con la tabla Cuestionario
    public function cuestionario()
    {
        return $this->belongsTo(Cuestionario::class, 'cuestionario', 'id');
    }
}
