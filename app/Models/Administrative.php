<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Administrative extends User
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

    public function amarres()
    {
        return $this->belongsToMany(Berth::class, 'administrative_berths', 'Administrativo_id', 'Amarre_id');
    }
    
    public function incidencia()
    {
        return $this->hasMany(Incident::class);
    }
    



}
