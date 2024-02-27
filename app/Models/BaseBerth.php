<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class BaseBerth extends Model
{
    use HasFactory;
    use SoftDeletes;
   // protected $primaryKey = 'Amarre_id';

    protected $fillable = [
      
        'FechaEntrada',
        'FinContrato',
        'Causa',
        'Amarre_id',

    ];

    public function plaza()
    {
        return $this->belongsTo(Berth::class, 'Amarre_id', 'id');
    }


    public function embarcacion()
    {
        return $this->belongsToMany(Boat::class, 'Rentals', 'PlazaBase_id', 'Embarcacion_id');
    }


}
