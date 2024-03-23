<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $primaryKey = 'id'; 

    protected $fillable = [
        'nombre',
        'apellidos',
        'genero',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'email',
        'password',
    ];

    public function demandante()
    {
        return $this->hasOne(Demandante::class, 'id', 'id');
    }

    public function seleccionador()
    {
        return $this->hasOne(Seleccionador::class, 'id', 'id');
    }

    // public $incrementing = false;

    /*public function roles()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id');
    }*/

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /*public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getEmailAttribute($email)
    {
        return strtolower($email);
    }

    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }

    public function getNombreAttribute($nombre)
    {
        return ucfirst($nombre);
    }

    public function getApellidosAttribute($apellidos)
    {
        return ucfirst($apellidos);
    }

    public function getGeneroAttribute($genero)
    {
        return ucfirst($genero);
    }

    public function getDireccionAttribute($direccion)
    {
        return ucfirst($direccion);
    }*/
}
