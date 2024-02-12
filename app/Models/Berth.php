<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Berth extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $with = ['administrativoamare'];
    protected $fillable = [
        'Estado',
        'TipoPlaza',
        'Anio',
        'Causa',
        'Pantalan_id',

    ];
    public function plazabase()
    {
        return $this->hasOne(BaseBerth::class);
    }

    public function transito()
    {
        return $this->hasOne(Transit::class);
    
    }

    public function administrativos()
    {
        return $this->belongsToMany(Administrative::class, 'administrative_berths', 'Amarre_id', 'Administrativo_id');
    }
}
