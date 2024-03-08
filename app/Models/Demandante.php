<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demandante extends Model
{
    protected $table = 'Demandante'; 

    protected $primaryKey = 'id'; 

    public $timestamps = false; // Indica si la tabla tiene los campos created_at y updated_at

    protected $fillable = [
        'id',
    ];

    // Define la relación con la tabla Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id', 'id');
    }

    // Define otras relaciones si las hubiera, por ejemplo, con la tabla CV
    public function cv()
    {
        return $this->hasOne(CV::class, 'id_demandante', 'id');
    }
}
