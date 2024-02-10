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

    protected $table = 'concessionaire_roles';
    
    public function concesionario()
    {
        return $this->belongsTo(Concessionaire::class, 'Concesionario_id');
    }

    public function instalación()
    {
        return $this->belongsTo(Facility::class, 'Instalacion_id');
    }
}
