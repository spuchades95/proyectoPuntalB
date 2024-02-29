<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Concessionaire extends User
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'Usuario_id';
  
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
        return $this->belongsToMany(Facility::class, 'concessionaire_facilities', 'Concesionario_id', 'Instalacion_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'concessionaire_roles', 'Concesionario_id', 'Rol_id');
    }

   
}
