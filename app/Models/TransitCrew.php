<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TransitCrew extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Tripulante_id',
        'Transito_id',
    ];

    protected $table = 'transit_crews';

  
}
