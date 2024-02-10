<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class TransitCrew extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Tripulante_id',
        'Transito_id',
    ];

    public function Tripulante()
    {
        return $this->belongsTo(Crew::class);
    }

    public function Transito()
    {
        return $this->belongsTo(Transit::class);
    }
}
