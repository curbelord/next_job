<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudios extends Model
{
    protected $table = 'Estudios'; // Nombre de la tabla en la base de datos

    public $timestamps = false; // Indica si la tabla tiene los campos created_at y updated_at

    protected $primaryKey = null; // Si no tiene una clave primaria propia

    public $incrementing = false; // Indica si la clave primaria es autoincremental

    protected $fillable = [
        'id_cv',
        'id_estudio',
        'nombre',
        'centro_estudios',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Define la relación con el modelo CV
    public function cv()
    {
        return $this->belongsTo(CV::class, 'id_cv', 'id');
    }
}
