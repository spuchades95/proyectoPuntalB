<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Role extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $with = ['concessionaireRoles'];
    protected $fillable = [
        'NombreRol',
        'Permisos',
        'Descripcion',
        'Causa',
    ];
}
