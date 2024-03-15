<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demandante extends Model
{
    protected $table = 'Demandante'; 

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function cv()
    {
        return $this->hasOne(CV::class, 'id_demandante', 'id');
    }
}
