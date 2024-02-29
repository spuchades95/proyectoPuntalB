<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ConcessionaireFacility extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Concesionario_id',
        'Rol_id',
    ];

    protected $table = 'concessionaire_facilities';

}
