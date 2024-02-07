<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class ConcessionaireFacility extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Concesionario_id',
        'Rol_id',
    ];
}
