<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
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
        return $this->belongsTo(Facility::class);
    }
    



}
