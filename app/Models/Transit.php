<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Transit extends Berth
{
    use HasFactory;
    use SoftDeletes;

    //protected $primaryKey = 'Amarre_id';

 
    
    protected $fillable = [
        'Proposito',
       
        'Guardamuelles_id',
       
        'Causa',
        'Administrativo_id',
        'Autorizacion',
        'Amarre_id',
        'Estatus',
    ];

    public function Guardamuelle()
    {
        return $this->belongsTo(DockWorker::class);
    }

    public function tripulantes()
    {
        return $this->belongsToMany(Crew::class, 'transit_crews', 'Transito_id','Tripulante_id');
    }

   
    public function embarcacion()
    {
        return $this->belongsToMany(Boat::class, 'transit_boats', 'Transito_id', 'Embarcacion_id');
    }


    public function plaza()
    {
        return $this->belongsTo(Berth::class,'Amarre_id','id');
    }
    public function guardiasciviles()
    {
        return $this->belongsToMany(CivilGuard::class, 'civil_guard_transits', 'Usuario_id', 'Transito_id');
    }
    public function administrativo()
    {
        return $this->belongsTo(Administrative::class, 'Administrativo_id');
    }

    public function guardamuelles()
    {
        return $this->belongsTo(DockWorker::class, 'Guardamuelles_id');
    }
}
