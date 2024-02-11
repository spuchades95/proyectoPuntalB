<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CivilGuardTransit extends Pivot
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'FechaVisualizacion',
        'GuardaCivil_id',
        'Transito_id',
    ];

    protected $table = 'civil_guard_transits';

    public function guardiaCivil()
    {
        return $this->belongsTo(CivilGuard::class, 'GuardaCivil_id');
    }

    public function transito()
    {
        return $this->belongsTo(Transit::class, 'Transito_id');
    }


}
