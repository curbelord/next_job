<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seleccionador extends Model
{
    protected $table = 'seleccionador'; 

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'id_empresa',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id');
    }

    public function ofertas()
    {
        return $this->hasMany(Oferta::class, 'id_seleccionador', 'id');
    }
}
