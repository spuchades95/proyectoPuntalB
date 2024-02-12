<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
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
        return $this->belongsToMany(Concessionaire::class, 'ConcessionaireFacility', 'Instalacion_id', 'Concesionario_id');
    }
    public function pantalanes()
    {
        return $this->hasMany(Dock::class);
    }

    public function usuarios()
    {
       
        return $this->hasMany(User::class);
    }


}
