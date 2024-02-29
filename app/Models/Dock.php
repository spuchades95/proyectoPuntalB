<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Dock extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Nombre',
        'Ubicacion',
        'Descripcion',
        'Capacidad',
        'FechaCreacion',
        'Causa',
        'Instalacion_id',
    ];

    public function instalacion()
    {
        return $this->belongsTo(Facility::class, 'Instalacion_id');
    }
    
    public function plazas()
    {
        return $this->hasMany(Berth::class, 'Pantalan_id');
    }



}
