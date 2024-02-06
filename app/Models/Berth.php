<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Berth extends Model
{
    use HasFactory;

    public function plazabase()
    {
        return $this->hasOne(BaseBerth::class);
    }

    public function transito()
    {
        return $this->hasOne(Transit::class);
    
    }


}
