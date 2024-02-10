<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class TransitCrew extends pivot
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Tripulante_id',
        'Transito_id',
    ];

    protected $table = 'transit_crews';

    public function tripulante()
    {
        return $this->belongsTo(Crew::class, 'Tripulante_id');
    }

    public function Transito()
    {
        return $this->belongsTo(Transit::class, 'Transito_id');
    }
}
