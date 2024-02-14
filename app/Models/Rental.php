<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;



class Rental extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'FechaInicio',
        'PlazaBase_id',
        'FechoFinalizacion',
        'Embarcacion_id ',
    ];
    public function embarcacion()
    {
        return $this->belongsTo(Boat::class,'Embarcacion_id');
    }
    public function plazaBase()
    {
        return $this->belongsTo(BaseBerth::class,'PlazaBaseId');
    }
}
