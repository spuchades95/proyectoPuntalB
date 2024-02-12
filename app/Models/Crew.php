<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Crew extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'NumeroDeDocumento',
        'Nombre',
        'Sexo',
        'Nacionalidad',
    ];
    protected $with = ['transitCrews'];
    public function transits()
    {
        return $this->belongsToMany(Transit::class, 'TransitCrew', 'Tripulante_id', 'Transito_id');
    }
}
