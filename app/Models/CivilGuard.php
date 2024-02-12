<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class CivilGuard extends User
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'Usuario_id';
    protected $fillable = [
        'Causa',
        'Usuario_id',
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class, 'Usuario_id');
    }
    public function transitos()
    {
        return $this->belongsToMany(Transit::class, 'civil_guard_transits', 'GuardaCivil_id', 'Transito_id');
    }
}
