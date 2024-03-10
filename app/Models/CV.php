<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $table = 'CV'; 

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'jornada_laboral',
        'puesto_trabajo',
        'tipo_trabajo',
        'id_demandante', 
    ];

    public function demandante()
    {
        return $this->belongsTo(Demandante::class, 'id_demandante', 'id');
    }

    public function estudios()
    {
        return $this->hasMany(Estudios::class, 'id_cv', 'id');
    }

    public function experiencia()
    {
        return $this->hasMany(Experiencia::class, 'id_cv', 'id');
    }
}
