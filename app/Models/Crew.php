<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
  
    public function transitos()
    {
        return $this->belongsToMany(Transit::class, 'transit_crews', 'Tripulante_id', 'Transito_id');
    }
}
