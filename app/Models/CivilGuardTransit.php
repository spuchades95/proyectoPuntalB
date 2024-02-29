<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

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




}
