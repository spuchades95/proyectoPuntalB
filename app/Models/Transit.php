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

    public function dockworker()
    {
        return $this->belongsTo(DockWorker::class);
    }

    public function crews()
    {
        return $this->belongsToMany(Crew::class, 'TransitCrew', 'Transit_id','Crew_id');
    }

    public function boats()
    {
        return $this->belongsToMany(Boat::class, 'TransitBoat', 'Transit_id','Boat_id');
    }
}
