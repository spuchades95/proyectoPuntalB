<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class CivilGuardTransit extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'FechaVisualizacion',
        'GuardaCivil_id',
        'Transito_id',
    ];

    protected $table = 'civil_guard_transits';

    public function GuardiaCivil()
    {
        return $this->belongsTo(CivilGuard::class);
    }

    public function Transito()
    {
        return $this->belongsTo(Transit::class);
    }


}
