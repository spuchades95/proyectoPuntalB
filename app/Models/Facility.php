<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Facility extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Ubicacion',
        'Dimensiones',
        'Descripcion',
        'Estado',
        'FechaCreacion',
        'Causa',
    ];

    public function concesionarios()
    {
        return $this->belongsToMany(Concessionaire::class, 'concessionaire_facilities', 'Instalacion_id', 'Concesionario_id');
    }
    public function pantalanes()
    {
        return $this->hasMany(Dock::class, 'Instalacion_id');
    }

    public function usuarios()
    {
       
        return $this->hasMany(User::class, 'Instalacion_id');
    }


}
