<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class ConcessionaireFacility extends Pivot
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Concesionario_id',
        'Rol_id',
    ];

    protected $table = 'concessionaire_facilities';

    public function concesionario()
    {
        return $this->belongsTo(Concessionaire::class, 'Concesionario_id');
    }

    public function rol()
    {
        return $this->belongsTo(Role::class, 'Rol_id');
    }
}
