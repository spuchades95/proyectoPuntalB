<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class ConcessionaireRole extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Concesionario_id',
        'Instalacion_id',
    ];

    public function Concesionario()
    {
        return $this->belongsTo(Concessionaire::class);
    }

    public function Instalación()
    {
        return $this->belongsTo(Facility::class);
    }
}
