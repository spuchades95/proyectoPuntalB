<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TransitBoat extends pivot
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Embarcacion_id',
        'Transito_id',
    ];

    protected $table = 'transit_boats';
    
    public function embarcacion()
    {
        return $this->belongsTo(Boat::class, 'Embarcacion_id');
    }

    public function transito()
    {
        return $this->belongsTo(Transit::class, 'Transito_id');
    }
}
