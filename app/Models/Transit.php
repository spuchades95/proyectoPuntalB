<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Transit extends Berth
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'Amarre_id';

    protected $with = ['transitBoats', 'transitCrews', 'civilGuardTransits'];
    
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

    public function tiupulantes()
    {
        return $this->belongsToMany(Crew::class, 'TransitCrew', 'Transito_id','Tipulante_id');
    }

    public function embarcaciones()
    {
        return $this->belongsToMany(Boat::class, 'TransitBoat', 'Transito_id','Embarcacion_id');
    }
}
