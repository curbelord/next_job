<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudios extends Model
{
    protected $table = 'estudios'; 

    public $timestamps = false; 

    protected $primaryKey = null; 

    public $incrementing = false; 

    protected $fillable = [
        'id_cv',
        'id_estudio',
        'nombre',
        'centro_estudios',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function cv()
    {
        return $this->belongsTo(CV::class, 'id_cv', 'id');
    }
}
