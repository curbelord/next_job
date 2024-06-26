<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $table = 'experiencia'; 

    public $timestamps = false; 

    protected $primaryKey = null; 

    public $incrementing = false; 

    protected $fillable = [
        'id_cv',
        'id_experiencia',
        'nombre',
        'centro_laboral',
        'fecha_inicio',
        'fecha_fin',
        'descripcion'
    ];

    public function cv()
    {
        return $this->belongsTo(CV::class, 'id_cv', 'id');
    }
}
