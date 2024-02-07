<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class TransitBoat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Embarcacion_id',
        'Transito_id',
    ];
}
