<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Transit extends Berth
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Proposito',
        'FechaEntrada',
        'Guardamuelles_id',
        'FechaSalida',
        'Causa',
        'Administrativo_id',
        'Autorizacion',
        'Amarre_id',
    ];
}
