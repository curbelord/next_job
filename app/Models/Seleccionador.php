<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seleccionador extends Model
{
    protected $table = 'Seleccionador'; 

    protected $primaryKey = 'id'; 

    public $timestamps = false; 

    protected $fillable = [
        'id',
        'id_empresa', // Si tienes un campo id_empresa en tu tabla Seleccionador
        // Otros campos de la tabla Seleccionador si los hubiera
    ];

    // Define la relación con la tabla Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id', 'id');
    }

    // Define la relación con la tabla Empresa si tienes el campo id_empresa en la tabla Seleccionador
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id');
    }

    // Define otras relaciones si las hubiera, por ejemplo, con la tabla Oferta
    public function ofertas()
    {
        return $this->hasMany(Oferta::class, 'id_seleccionador', 'id');
    }
}
