<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Concessionaire extends User
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'Usuario_id';
    protected $with = ['concessionaireFacilities', 'concessionaireRoles'];
    protected $fillable = [
        'Causa',
        'Usuario_id',
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'Usuario_id');
    }
    public function instalaciones()
    {
        return $this->belongsToMany(Facility::class, 'ConcessionaireFacility', 'Concesionario_id', 'Instalacion_id');
    }

   
}
