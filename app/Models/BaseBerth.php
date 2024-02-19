<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class BaseBerth extends Berth
{
    use HasFactory;
    use SoftDeletes;
   // protected $primaryKey = 'Amarre_id';

    protected $fillable = [
        'DatosEstancia',
        'FechaEntrada',
        'FinContrato',
        'Causa',
        'Amarre_id',

    ];
}
