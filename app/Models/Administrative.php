<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administrative extends User
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'Usuario_id';
  
    protected $fillable = [
        'Causa',
        'Usuario_id',
    ];

    // public function usuario()
    // {
    //     return $this->belongsTo(User::class, 'id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function amarres()
    {
        return $this->belongsToMany(Berth::class, 'administrative_berths', 'Administrativo_id', 'Amarre_id');
    }
    
    public function incidencia()
    {
        return $this->hasMany(Incident::class, 'Administrativo_id');
    }
    public function transito()
    {
        return $this->hasMany(Transit::class, 'Administrativo_id');

    }
    



}
