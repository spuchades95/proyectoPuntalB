<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Transit extends Berth
{
    use HasFactory;
    use SoftDeletes;

    //protected $primaryKey = 'Amarre_id';

 
    
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

    public function Guardamuelle()
    {
        return $this->belongsTo(DockWorker::class);
    }

    public function tripulantes()
    {
        return $this->belongsToMany(Crew::class, 'TransitCrew', 'Transito_id','Tripulante_id');
    }

    public function embarcaciones()
    {
        return $this->belongsToMany(Boat::class, 'transit_boats', 'Transito_id','Embarcacion_id');
    }

    public function guardiasciviles()
    {
        return $this->belongsToMany(CivilGuard::class, 'civil_guard_transits', 'Usuario_id', 'Transito_id');
    }
}
