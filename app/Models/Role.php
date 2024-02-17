<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'NombreRol',
        'Permisos',
        'Descripcion',
        'Causa',
    ];

    public function concesionarios()
    {
        return $this->belongsToMany(Concessionaire::class, 'concessionaire_roles', 'Concesionario_id', 'Rol_id');
    }


    public function concesionario()
    {
        return $this->belongsToMany(Concessionaire::class);
    }
    public function usuario()
    {
        return $this->hasMany(User::class);
    }
}
